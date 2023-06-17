<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }

    protected $casts = [
        'created_at' => 'date',
    ];

    protected $fillable = ['request', 'paid', 'date_start', 'date_end', 'room_id', 'customer_id', 'admin_id', 'total_price', 'total_room', 'total_deposits', 'active', 'deposits'];

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $customer = Customer::where('name', 'LIKE', '%' . $key . '%')->orWhere('phone', $key)->first();
            $room = Room::where('name', 'LIKE', '%' . $key . '%')->first();
            if ($customer) {
                $customer_id = $customer->id;
                $query = $query->where('customer_id', $customer_id);
            }
            if ($room) {
                $room_id = $room->id;
                $query = $query->where('room_id', $room_id);
            }
        }
        return $query;
    }
}
