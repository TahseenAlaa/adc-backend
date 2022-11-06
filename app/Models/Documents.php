<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class Documents extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_docs";

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function source() {
        return $this->hasOne(Providers::class, 'id', 'provider_id');
    }

    public function destination() {
        return $this->hasOne(Providers::class, 'id', 'destination_id');
    }
}