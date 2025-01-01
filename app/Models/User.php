<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // kolom yg diisi
    protected $table = 'users';

    protected $fillable = [
        'name',
        'user_role_id',
    ];

    // Relasi dgn tabel user_roles
}
