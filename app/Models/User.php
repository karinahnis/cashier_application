<?php

namespace App\Models; 
use illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
class users extends Model { 
    use HasFactory;

    // kolom yg  diisi
    protected $table = 'users';

    protected $fillable = [
        'name',
        'user_role_id',
    ];

    // Relasi dgn tabel user_roles
    public function userRole()  {
        return $this->belongsTo(UserRole::class, 'user_role_id');
    }
}

