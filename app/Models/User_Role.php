<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    // bikin kolom
    protected $table = 'user_roles';

    protected $fillable = [
        'name',
    ];


    public function users() {
        return $this->hasMany(User::class, 'user_role_id');
    }
}