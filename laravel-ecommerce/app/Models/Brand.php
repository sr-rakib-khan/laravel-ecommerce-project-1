<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name',
        'brand_slug',
        'brand_logo',
        'fornt_page'
    ];


    function product()
    {
        return $this->hasMany(product::class);
    }
}
