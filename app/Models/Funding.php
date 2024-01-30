<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funding extends Model
{
    use HasFactory;

    protected $fillable = [
        'funder',
        'cost',
        'description',
        'project_id',
        'government_institution_id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function governmentInstitution()
    {
        return $this->belongsTo(GovernmentInstitution::class);
    }
}
