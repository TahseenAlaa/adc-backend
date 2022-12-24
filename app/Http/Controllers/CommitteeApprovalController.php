<?php

namespace App\Http\Controllers;

use App\Models\CommitteeApprovals;
use App\Models\Drugs;
use App\Models\PatientsHistory;
use App\Models\Treatment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommitteeApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all drug need committee approval
        $committeeDrugsList = Drugs::select('id')->where('drug_type', '=', 1)->get();

        // Fetch approvals count
        $committeeApprovals = CommitteeApprovals::select('treatment_id', DB::raw('count(*) as approvals_count'))
            ->groupBy('treatment_id')
            ->get();

        // Fetch committee approved by the account holder
        $committeeApprovalsByAccountHolder = CommitteeApprovals::select('treatment_id')
            ->where('created_by', '=', auth('sanctum')->user()->id);

        // Exclude treatment cases on approval equal to 3
        $finishedCommitteeApprovals = [];

        foreach ($committeeApprovals as $key => $element) {
            if ($element->approvals_count >= 3) {
                $finishedCommitteeApprovals[] = $element->treatment_id;
            }
        }

        // fetch all treatment contain drugs need approval and still pending
        $drugsListInTreatment = Treatment::whereIn('drug_id', $committeeDrugsList)
            ->where('status', '=', 0)
            ->whereNotIn('id', $finishedCommitteeApprovals)
            ->whereNotIn('id', $committeeApprovalsByAccountHolder)
            ->with([
                'patient:id,full_name,phone,last_visit,uuid',
                'patient_history:id,uuid',
                'drugs:id,title',
                'user:id,full_name',
                'updatedUser:id,full_name',
                'committee_approvals'
            ])
            ->get();




        return response([
            'data' => $drugsListInTreatment
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treatmentItemsList = [];

        foreach ($request->treatments as $item) {
            $newCommitteeApproval = new CommitteeApprovals;
            $newCommitteeApproval->treatment_Id = $item['id'];
            $newCommitteeApproval->status = $request->status;
            $newCommitteeApproval->created_by = auth('sanctum')->user()->id;
            $newCommitteeApproval->created_at = Carbon::now();
            $newCommitteeApproval->save();

            // Add Items to the treatment array
            $treatmentItemsList[] = $item['id'];
        }

        // Fetch approvals count
        $committeeApprovals = CommitteeApprovals::select('treatment_id', DB::raw('count(*) as approvals_count'))
            ->whereIn('treatment_id', $treatmentItemsList)
            ->where('status', '=', 1)
            ->groupBy('treatment_id')
            ->get();

        foreach ($committeeApprovals as $item) {
            if ($item->approvals_count >= 3) {
                Treatment::where('id', '=', $item->treatment_id)
                    ->update([
                        'status' => 1
                    ]);
            }
        }

        return response([
            'data' => $committeeApprovals
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // Fetch all drug need committee approval
        $committeeDrugsList = Drugs::select('id')->where('drug_type', '=', 1)->get();
        $patientHistoryId = PatientsHistory::select('id')->where('uuid', '=', $request->patient_history_uuid)->first()->id;

        $patientHistoryTreatment = Treatment::where('patient_history_id', '=', $patientHistoryId)
            ->whereIn('drug_id', $committeeDrugsList)
            ->with([
                'patient:id,full_name,phone,last_visit,uuid',
                'patient_history:id,uuid',
                'drugs:id,title',
                'user:id,full_name',
                'updatedUser:id,full_name',
                'committee_approvals'
            ])
            ->get();

        return response([
            'data' => $patientHistoryTreatment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
