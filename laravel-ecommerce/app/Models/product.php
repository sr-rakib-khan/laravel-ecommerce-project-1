<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Childcategory;
use App\Models\Brand;
use App\Models\Pickup_point;


class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'subcategory_id ',
        'childcategory_id',
        'brand_id',
        'pickup_point_id',
        'name',
        'code',
        'unit',
        'tags',
        'color',
        'size',
        'video',
        'purchase_price',
        'selling_price',
        'discount_price',
        'stock_quantity',
        'warehouse',
        'description',
        'thumbnail',
        'images',
        'featured',
        'today_deal',
        'status',
        'flash_deal_id',
        'cash_on_delivery',
        'admin_id'
    ];

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }

    function childcategory()
    {
        return $this->belongsTo(Childcategory::class, 'childcategory_id');
    }

    function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }


    function pickup_point()
    {
        return $this->belongsTo(Pickup_point::class, 'pickup_point_id');
    }

    // jon with review
    function review()
    {
        return $this->hasOne(Review::class, 'id');
    }
}
