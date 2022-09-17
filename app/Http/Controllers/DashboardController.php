<?php

namespace App\Http\Controllers;

use App\Models\Patients;
use App\Models\PatientsHistory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        // All Patients Count
        $allPatientsCount = Patients::all()->count();

        // All doctors count
        $doctorsCount = User::where('job_title', '=', 'Doctor')->count();

        // Patients Counts Today
        $patientsCountToday = PatientsHistory::whereDate('created_at', '>=', Carbon::today())->count();

        // Patients Counts Month
        $patientsCountMonth = PatientsHistory::whereDate('created_at', '>=', Carbon::now()->month)->count();

        return response([
            'allPatientsCount'        => $allPatientsCount,
            'doctorsCount'            => $doctorsCount,
            'patientsCountToday'      => $patientsCountToday,
            'patientsCountMonth'      => $patientsCountMonth
        ], 200);
    }
}
