<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Form extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'user_id',
        'nip',
        'dob',
        'religion',
        'phone',
        'last_education',
        'last_education_major',
        'last_education_institution',
        'work_unit',
        'position_id',
        'instance_id',
        'golongan_id',
        'skill_id',
        'province_id',
        'district_id',
        'subdistrict_id',
        'village_id',
        'address',
        'status',
        'period_id',
        'updated_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'religion' => 'string',
        'last_education' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function instance()
    {
        return $this->belongsTo(Instance::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}