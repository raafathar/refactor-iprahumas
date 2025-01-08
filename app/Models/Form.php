<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Form extends Model
{
    use HasFactory, Notifiable, HasUuids;

    protected $fillable = [
        'user_id',
        'nip',
        'dob',
        'new_member_number',
        'religion',
        'phone',
        'last_education',
        'last_education_major',
        'last_education_institution',
        'work_unit',
        'position_id',
        'instance_id',
        'golongan_id',
        'province_id',
        'district_id',
        'subdistrict_id',
        'village_id',
        'address',
        'payment_proof',
        'status',
        'reason',
        'period_id',
        'updated_by',
    ];

    protected $casts = [
        'dob' => 'date',
        'religion' => 'string',
        'last_education' => 'string',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(Position::class);
    }

    public function instance(): BelongsTo
    {
        return $this->belongsTo(Instance::class);
    }

    public function golongan(): BelongsTo
    {
        return $this->belongsTo(Golongan::class);
    }

    public function skill(): BelongsTo
    {
        return $this->belongsTo(Skill::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function subdistrict(): BelongsTo
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class);
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(Period::class);
    }

    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'detail_form_skills', 'form_id', 'skill_id');
    }
}
