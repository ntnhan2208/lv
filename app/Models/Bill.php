<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $casts = [
        'service' => 'array',
    ];

    protected $fillable = [
//        'month',
        'date',
        'total_room',
        'service',
        'total',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
