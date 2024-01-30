<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentInstitution extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
    ];

    public function annualWorkPlans()
    {
        return $this->hasMany(AnnualWorkPlan::class);
    }

    public function hr()
    {
        return $this->hasMany(Hr::class);
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function funding()
    {
        return $this->hasMany(Funding::class);
    }

    public function repositories()
    {
        return $this->hasMany(Repository::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function productionUnity()
    {
        return $this->hasMany(ProductionUnity::class);
    }

    public function mandates()
    {
        return $this->hasMany(Mandate::class);
    }

}
