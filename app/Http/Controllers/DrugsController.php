<?php

namespace App\Http\Controllers;

use App\Models\Drugs;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => Drugs::with([
                'user:id,full_name',
                'updatedUser:id,full_name'
            ])
                ->get()
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
        $newDrug = new Drugs;
        $newDrug->title       = $request->title;
        $newDrug->drug_type   = $request->drug_type;
        $newDrug->item_type   = $request->item_type;
        $newDrug->created_by  = auth('sanctum')->user()->id;
        $newDrug->created_at  = Carbon::now();
        $newDrug->save();

        return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {
        Drugs::where('id', '=', $request->id)->update([
            'title'      => $request->title,
            'drug_type'  => $request->drug_type,
            'item_type'  => $request->item_type,
            'updated_by' => auth('sanctum')->user()->id,
            'updated_at' => Carbon::now()
        ]);

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Drugs::where('id', '=', $request->id)->delete();

        return $this->index();
    }
}
