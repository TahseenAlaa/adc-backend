<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class SymptomsTypes extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_symptoms_types";

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by')->withTrashed();
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by')->withTrashed();
    }
}
