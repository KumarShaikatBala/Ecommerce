<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name','category_id','brand_id','product_short_description','product_long_description',
        'product_price','product_img','product_size','product_color','publication_status',
    ];
}
