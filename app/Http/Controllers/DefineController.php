<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DefineController extends Controller
{

    public function define($id){
    $couriers = DB::table('couriers')->get();
    $orders = DB::table('orders')->find($id);
    return view('test',['couriers'=> $couriers,'orders'=>$orders]);
    }
}
