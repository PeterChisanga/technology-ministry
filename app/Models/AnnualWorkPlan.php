<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualWorkPlan extends Model
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
}
