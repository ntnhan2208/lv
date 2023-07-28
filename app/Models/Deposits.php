<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposits extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'date',
        'date_start',
        'room_id',
        'type',
        'note',
        'type',
        'status',
        'email'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }


}
