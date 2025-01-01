<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class LetterHistory extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'letter_number',
        'number_sequence',
        'sender',
        'letter_type',
        'letter_date',
        'recipient',
        'created_by',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getFormattedSequenceAttribute(): string
    {
        return str_pad($this->number_sequence, 4, '0', STR_PAD_LEFT);
    }
}