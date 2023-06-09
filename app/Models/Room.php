<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }


    protected $fillable = ['name', 'amount', 'image', 'price', 'booked', 'type_id', 'description', 'is_enabled', 'admin_id','acreage'];

}
