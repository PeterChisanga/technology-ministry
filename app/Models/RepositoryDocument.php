<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepositoryDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file_path',
        'repository_id',
    ];

    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }
}
