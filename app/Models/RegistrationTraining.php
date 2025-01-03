<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RegistrationTraining extends Model
{
    protected $guarded = [];

    public function training(): BelongsTo
    {
        return $this->belongsTo(Training::class);
    }
}
