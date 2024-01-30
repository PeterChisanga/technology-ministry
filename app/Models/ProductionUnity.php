<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionUnity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'capacity',
        'duration',
        'status',
        'manager',
        'government_institution_id',
    ];

    public function governmentInstitution()
    {
        return $this->belongsTo(GovernmentInstitution::class);
    }
}
