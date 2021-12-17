<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name', 'categori_id', 'brand_id', 'price', 'info', 'image', 'discount', 'rating','stock', 'sold', 'supplier_id', 'active'];
    protected $dates = ['deleted_at'];

    public function checkout()
    {
        return $this->hasMany(checkout::class);
    }
    
    public function cart()
    {
        return $this->hasMany(cart::class);
    }

    public function brand()
    {   
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    
    public function categori()
    {   
        return $this->belongsTo(Categori::class, 'categori_id');
    }

    public function logproduct()
    {   
        return $this->hasMany(logproduct::class);
    }

    
}
