<?php

namespace App\Http\Controllers;

use App\Models\DocumentsItems;
use App\Models\Patients;
use App\Models\PatientsHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index () {
        // Patients Counts Month
        $patientsCountMonth = PatientsHistory::select(DB::raw('DATE(created_at) as date, COUNT(*) as count'))
            ->whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->groupBy('date')
            ->get();

        $mostUsedDrugsThisMonth = DocumentsItems::select(DB::raw('COUNT(*) as count, drug_id'))
            ->whereNotNull('to_patient')
            ->whereDate('created_at', '>=', Carbon::now()->subMonth())
            ->groupBy('drug_id')
            ->with(['drugs'])
            ->get();



        return response([
            'patientsCountMonth'      => $patientsCountMonth,
            'totalDrugsCount'         => app('App\Http\Controllers\PharmacyController')->index(),
            'mostUsedDrugsThisMonth' => $mostUsedDrugsThisMonth
        ], 200);
    }
}
