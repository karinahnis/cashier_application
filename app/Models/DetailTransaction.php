<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $table = 'detail_transactions';

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantities',
    ];

    // Relasi ke model Transaction
    public function transaction() {
        return $this->belongTo(transaction::class, 'transaction_id');
    }

    // Relasi ke model Product
    public function product() {
        return $this->belongTo(Product::class, 'product_id');
    }

}
