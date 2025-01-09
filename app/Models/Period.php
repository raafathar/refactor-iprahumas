<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Period extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function forms(): belongsToMany
    {
        return $this->belongsToMany(Form::class, 'detail_form_periods', 'period_id', 'form_id')->withTimestamps();
    }
}
