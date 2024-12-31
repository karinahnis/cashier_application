<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'payment_method_id',
        'user_id',
    ];

    public function payment_method() {
        return $this->belongTo(payment_method::class, 'payment_methods_id');
    }

    // relaso ke model User
    public function user() {
        return $this->belongTo(User::class, 'user_id');
    }
}
