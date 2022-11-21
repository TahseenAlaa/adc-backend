<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Treatment extends Model implements HasMedia
{
    use HasApiTokens, HasFactory, SoftDeletes, InteractsWithMedia;

    protected $table = "esite_treatment";

    public function user() {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function updatedUser() {
        return $this->hasOne(User::class, 'id', 'updated_by');
    }

    public function drugs() {
        return $this->hasOne(Drugs::class, 'id', 'drug_id')->withTrashed();
    }
}
