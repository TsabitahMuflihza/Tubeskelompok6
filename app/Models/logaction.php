<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'bill_id', 'action', 'keterangan'];

    public function user()
    {   
        return $this->belongsTo(User::class, 'user_id');
    }

    public function bill()
    {
        return $this->belongsTo(bill::class, 'bill_id');
    }
}
