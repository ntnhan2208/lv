<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class Admin extends Authenticatable
{
    use Notifiable;
    use LogsActivity;

    protected $guard = 'admin';

    public function types()
    {
        return $this->hasMany(Type::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    protected $fillable = [
        'name', 'email', 'password', 'phone', 'image', 'gender', 'role', 'personal_id'
    ];

    protected $hidden = [
        'password', 'remember_token', 'secret_code'
    ];


    public function setPasswordAttribute($password)
    {
        if ($password !== null && $password !== '')
            $this->attributes['password'] = bcrypt($password);
    }

}
