<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'government_institution_id',
    ];

    public function governmentInstitution()
    {
        return $this->belongsTo(GovernmentInstitution::class);
    }

    public function repositoryDocuments()
    {
        return $this->hasMany(RepositoryDocument::class);
    }
}
