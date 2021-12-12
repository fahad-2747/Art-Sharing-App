<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $fillable = [
        'art_name',
        'cat_id',
        'artis_name',
        'description',
        'art_image',
        'price',
        'rating',
    ];
}
