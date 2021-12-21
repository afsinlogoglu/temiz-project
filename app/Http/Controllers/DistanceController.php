<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DistanceController extends Controller
{
    public function getDistance(){
        
        $couriers = DB::table('couriers')->get();
        $orders = DB::table('orders')->get();
        
        $courierAddresses=[];
        $orderAddresses=[];
        foreach ($orders as $order ) {
            $finalDistance = 10000;
            foreach ($couriers as $courier) {
                $origin = trim($courier->location);
                $destination = trim($order->senderAddress);
                $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".urlencode($origin)."&destinations=".urlencode($destination)."&key=AIzaSyCQ2FPxd1qW0LQQ3gHt4QIVBVoK_AxaoGc"; 
                $Data = json_decode(file_get_contents($url));
                $distance = ($Data->rows[0]->elements[0]->distance->value)/1000;
                
                if($distance<$finalDistance){
                 $finalDistance = $distance;
                 $result = DB::table('orders')
                 ->where('id', $order->id)
                 ->update([
                     'courier_id' => $courier->id,
                 ]);
                 
             }
            }
        }
        return response('All orders sended to Couriers',200);}
}
