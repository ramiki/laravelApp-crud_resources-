<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';
    public $timestamps = true;

    protected $casts = [
        'age' => 'string'
    ];

    protected $fillable = [
        'name',
        'email',
        'created_at',
        'age',
        'note'
    ];
}
