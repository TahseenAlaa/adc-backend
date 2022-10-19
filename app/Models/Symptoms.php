<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Symptoms extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_symptoms";

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function symptom() {
        return $this->hasOne(SymptomsTypes::class, 'id', 'symptoms_id');
    }
}