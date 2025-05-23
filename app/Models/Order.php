<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'total',
        'status',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'userId', 'id');
    }
}
