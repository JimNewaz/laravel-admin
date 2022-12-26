<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'summary',  
        'description',
        'product_image',
        'category_id',
        'category',
        'sub_category_id',
        'sub_category', 
        'sku',
        'item_in_stock',
        'regular_price',
        'selling_price',
        'status',


    ];

}
