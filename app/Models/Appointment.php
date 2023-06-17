<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'date',
        'status',
        'employee_id',
        'room_id'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }


}
