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

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function testGroups() {
        return $this->hasOne(TestGroups::class, 'id', 'test_id');
    }
}
