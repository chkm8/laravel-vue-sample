<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageStack extends Model
{
    use HasFactory;

    protected $fillable = [
        'index',
        'name',
        'path',
    ];
}
