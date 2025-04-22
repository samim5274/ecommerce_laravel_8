<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'phone',
        'address',
        'dob',
        'departmentId',
        'status',
        'role',
    ];

    public function order()
    {
        return $this->hasMany(Admin::class, 'userId', 'id');
    }
}
