<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','resto_id'];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'resto_id');
    }
}
