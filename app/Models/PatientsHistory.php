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

}
