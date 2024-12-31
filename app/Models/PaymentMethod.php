<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'payment_method';

    protected $fillable = [
        'name',
    ];

    // cth jika metode pembayaran terkait dgn transaksi
    public function transaction() {
        return $this->hasMany(Transaction::class, 'payment_method_id');
    }
}
