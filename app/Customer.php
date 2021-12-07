<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected static function boot()
{
    parent::boot();

    // auto-sets values on creation
    static::creating(function ($query) {
        $query->token = str_random(10);
    });
}
    protected $fillable = ['name','email'];


}
