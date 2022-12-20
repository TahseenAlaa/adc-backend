<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Treatment extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = "esite_treatment";

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by')->withTrashed();
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by')->withTrashed();
    }

    public function drugs() {
        return $this->hasOne(Drugs::class, 'id', 'drug_id')->withTrashed();
    }

    public function patient() {
        return $this->belongsTo(Patients::class, 'patient_id', 'id')->withTrashed();
    }

    public function patient_history() {
        return $this->belongsTo(PatientsHistory::class, 'patient_history_id', 'id')->withTrashed();
    }

    public function committee_approvals() {
        return $this->hasMany(CommitteeApprovals::class, 'treatment_id', 'id')->with([
            'user:id,full_name',
            'updatedUser:id,full_name',
        ]);
    }
}
