<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesComission extends Model
{
    use HasFactory;

    protected $table = 'employees_comission';
    protected $fillable = ['employee_id','room_id','commission','status'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
