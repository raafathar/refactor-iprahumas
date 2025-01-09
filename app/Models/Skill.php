<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Skill extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'name',
    ];

    public function forms(): belongsToMany
    {
        return $this->belongsToMany(Form::class, 'detail_form_skills', 'skill_id', 'form_id');
    }
}
