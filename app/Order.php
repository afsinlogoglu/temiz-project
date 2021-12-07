<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_token',
        'courier_id',
        'senderName',
        'senderPhone',
        'receiverName',
        'receiverPhone',
        'senderAddress',
        'receiverAddress',];

        public function customers(){
            return $this->belongsTo(Customer::class,'customer_token','token');
        }

        public function couriers(){
            return $this->hasOne(Courier::class,'courier_id');
        }
}
