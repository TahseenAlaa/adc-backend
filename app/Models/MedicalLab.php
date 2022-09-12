<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalLab extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "esite_medical_lab";
}
