<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'name', 'mm_name', 'image'];
    public function product()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }


    public function twoProduct()
    {
        return $this->product()->take(2);
    }
}
