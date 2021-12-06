<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MilesController extends Controller
{
    public function miles(Request $request){

        
        $pick = str_replace(' ', '', $request->input('pick'));
        $delivery = str_replace(' ', '', $request->input('delivery'));

        $mileage_result = file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/
        json?origins='. $pick . '&destinations=' . $delivery . '&key=' . env('GOOGLE_API_KEY'));
        $mileage_result = json_decode($mileage_result);

        dd($mileage_result);
    }
}
