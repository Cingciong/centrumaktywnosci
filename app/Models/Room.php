<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $casts = [
        'utilities' => 'array',
    ];

    protected $fillable = [
        'name',
        'description',
        'localization',
        'img',
        'numberOfPeople',
        'size',
        'price',
        'utilities',
    ];
}
