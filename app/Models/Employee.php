<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gender',
        'phone',
        'personal_id',
        'email',
        'commission'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function appointment()
    {
        return $this->hasOne(Appointment::class);
    }

    public function employeesCommissions()
    {
        return $this->hasMany(EmployeesComission::class);
    }
    public function scopeSearch($query)
    {
        if ($key = request()->key) {
            $query = $query->where('name', 'LIKE', '%' . $key . '%')
                ->orWhere('id', $key)
                ->orWhere('gender', $key)
                ->orWhere('phone', $key)
                ->orWhere('personal_id', $key);
        }
        return $query;
    }

}
