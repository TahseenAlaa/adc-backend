<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class MedicalLab extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_medical_lab";
}
