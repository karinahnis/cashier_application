<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'price',
        'stock_available'
    ];

    public function category() {
        return $this->belongTo(category::class);
    }
}
