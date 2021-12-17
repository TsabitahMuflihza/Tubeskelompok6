<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logproduct extends Model
{
    use HasFactory;
    protected $fillable = ['action', 'user_id', 'product_id', 'quantity', 'keterangan'];

    public function user()
    {   
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
