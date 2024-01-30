<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mandate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'government_institution_id',
    ];

    public function governmentInstitution()
    {
        return $this->belongsTo(GovernmentInstitution::class);
    }
}
