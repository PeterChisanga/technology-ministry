<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function procurements(){
        return $this->hasMany(Procurement::class);
    }

    public function strategies(){
        return $this->hasMany(Strategy::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
 
}
