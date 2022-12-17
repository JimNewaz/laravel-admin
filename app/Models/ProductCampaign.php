<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_product',
        'original_price',  
        'campaign_price',
        'total_quantity',  
        'sell_quantity',  
        'start_date',
        'end_date',
    ];

}
