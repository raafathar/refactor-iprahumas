<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Training extends Model
{
    use HasUuids;
    protected $guarded = [];

    public function registration_training(): HasMany
    {
        return $this->hasMany(RegistrationTraining::class);
    }
}
