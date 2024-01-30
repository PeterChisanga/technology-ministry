<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_id',
        'file_path',
    ];
 
    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
