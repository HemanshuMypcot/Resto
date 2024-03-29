<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['name','email','address','file','user_name'];
    public function employee()
    {
        return $this->hasMany(Employee::class,'resto_id');
    }
}
