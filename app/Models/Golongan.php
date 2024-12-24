<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Golongan extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'sort_order',
    ];

    public function forms()
    {
        return $this->hasMany(Form::class);
    }
}