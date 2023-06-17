<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'personal_id',
        'admin_id'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'LIKE', '%' . $key . '%')
                ->orWhere('phone', $key)
                ->orWhere('personal_id', $key);
        }
        return $query;
    }
}
