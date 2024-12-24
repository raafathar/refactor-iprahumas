<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'name',
        'subdistrict_id',
    ];

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }
}