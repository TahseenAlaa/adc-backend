<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientsHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "esite_patients_history";

}
