<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class DocumentsItems extends Model
{
    use HasApiTokens, HasFactory, SoftDeletes;

    protected $table = "esite_docs_items";

    public function drugs() {
        return $this->hasOne(Drugs::class, 'id', 'drug_id')->withTrashed();
    }
}
