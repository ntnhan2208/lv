<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }

    protected $fillable = ['name', 'description', 'price', 'is_enabled', 'admin_id', 'unit_price'];


}
