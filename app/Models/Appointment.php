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

    public function checkAppointment($roomId){
        $appointmentOfRooms = self::where('room_id', $roomId)->get();
        if($appointmentOfRooms){
            foreach ($appointmentOfRooms as $appointmentOfRoom){
                self::where('room_id', $roomId)->where('status','<>',2)->update(['status' => 4]);
            }
        }
    }
}
