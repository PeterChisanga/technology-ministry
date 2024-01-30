<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'government_institution_id',
        'cost',
        'project_manager',
        'start_date',
        'duration',
        'stop_date',
    ];

    public function governmentInstitution()
    {
        return $this->belongsTo(GovernmentInstitution::class);
    }

    public function funding()
    {
        return $this->hasMany(Funding::class);
    }
}
