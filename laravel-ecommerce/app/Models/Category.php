<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable = [
        'category_name',
        'show_homepage',
        'category_logo',
        'category_slug',
    ];

    function product()
    {
        return $this->hasMany(product::class);
    }
}
