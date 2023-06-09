<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    protected $fillable = ['name', 'description', 'admin_id'];

}
