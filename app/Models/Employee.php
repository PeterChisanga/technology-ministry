<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'first_name',
        'middle_name',
        'last_name',
        'salary',
        'joining_date',
        'end_date',
        'birth_date',
        'contact_number',
        'email',
        'address',
        'emergency_contact_name',
        'emergency_contact_number',
        'emergency_contact_relationship',
        'health_and_safety',
        'employee_type',
        'compensation_and_benefits',
        'role',
        'user_id',
        'department_id',
    ];

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
}
