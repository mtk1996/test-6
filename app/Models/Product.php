<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_id', 'slug', 'name', 'image', 'description',
        'stock_qty', 'sell_price', 'discounted_price', 'order_count'
    ];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        return asset('/images/' . $this->image);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }
    public function color()
    {
        return $this->belongsToMany(Color::class, 'color_products');
    }
    public function product_buy()
    {
        return $this->hasMany(ProductBuy::class);
    }

    public function product_destroy()
    {
        return $this->hasMany(ProductDestroy::class);
    }

    public function product_cart()
    {
        return $this->hasMany(ProductCart::class);
    }

    public function product_order()
    {
        return $this->hasMany(ProductOrder::class);
    }
    public function product_review()
    {
        return $this->hasMany(ProductReview::class);
    }
}
