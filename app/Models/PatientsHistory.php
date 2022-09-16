<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PatientsHistory extends Model  implements HasMedia
{
    use HasApiTokens, HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = "esite_patients_history";

    protected $fillable = [
        'full_name',
        'patient_picture',
        'phone',
        'occupation',
        'gender',
        'birthdate',
        'address',
        'smoker',
        'drinker',
        'family_dm',
        'gestational_dm',
        'weight_baby',
        'hypert',
        'family_ihd',
        'parity',
        'smbg',
        'ihd',
        'cva',
        'pvd',
        'neuro',
        'weight',
        'height',
        'wc',
        'bmi',
        'hip',
        'retino',
        'nonpro',
        'prolif',
        'macul',
        'insul',
        'amput',
        'ed',
        'nafld',
        'dermo',
        'dfoot',
        'date_insulin',
        'duration_insulin',
        'duration_dm',
        'glycemic',
        'lipid',
        'pressure',
        'f_height',
        'm_height',
        'mid_height',
        'fa1c',
        'sa2c',
        'referral',
    ];
}
