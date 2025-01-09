<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    protected $fillable = [
        'name',
        'province_id',
    ];

    public function province(): belongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function subdistrict(): hasMany
    {
        return $this->hasMany(Subdistrict::class);
    }
}
