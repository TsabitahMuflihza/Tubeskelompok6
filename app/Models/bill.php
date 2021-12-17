<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'total', 'payment_status', 'product_status', 'address', 'shipping_cost', 'shipping_company', 'customer_note'];

    public function user()
    {   
        return $this->belongsTo(User::class, 'user_id');
    }

    public function logaction()
    {
        return $this->hasMany(logaction::class);
    }

    public function bank()
    {
        return $this->hasMany(PaymentBank::class);
    }
}
