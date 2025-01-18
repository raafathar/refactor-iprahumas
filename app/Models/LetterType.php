<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LetterType extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'kode',
        'name',
    ];
}
