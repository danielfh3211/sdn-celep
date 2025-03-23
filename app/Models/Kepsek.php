<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    protected $fillable = [
        'image',
        'name',
        'position',
        'description',
        'motivation'
    ];
}
