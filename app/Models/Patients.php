<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Patients extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_patients";

    public function patientHistory() {
        return $this->hasMany(PatientsHistory::class, 'patient_id', 'id')->withTrashed();
    }

    public function latestPatientHistory() {
        return $this->hasOne(PatientsHistory::class, 'patient_id', 'id')->latestOfMany()->withTrashed();
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by')->withTrashed();
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by')->withTrashed();
    }
}
