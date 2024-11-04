<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\User;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'review',
        'rating',
        'review_date',
        'review_month',
        'review_year'
    ];

    function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
}
