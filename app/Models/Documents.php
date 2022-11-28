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
        return $this->hasOne(User::class, 'id', 'created_by')->withTrashed();
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by')->withTrashed();
    }

    public function source() {
        return $this->hasOne(Providers::class, 'id', 'provider_id')->withTrashed();
    }

    public function destination() {
        return $this->hasOne(Providers::class, 'id', 'destination_id')->withTrashed();
    }

    public function items() {
        return $this->hasMany(DocumentsItems::class, 'parent_doc', 'id')->withTrashed();
    }
}
