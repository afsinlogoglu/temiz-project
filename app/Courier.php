<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    protected $fillable = ['name','phone','capacity','plate','location'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
