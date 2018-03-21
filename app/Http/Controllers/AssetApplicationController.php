<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AssetApplicationController extends Controller
{

	private $bookings = 0;


     public function Application(Request $request){
     	//Increase the number of booking 

     	$bookings = DB::table('asset_models')->select('bookings')->first();

     	$bookings = $bookings + 1;


     	DB::table('asset_models')->where('id', $request->asset_id)
                    ->update(
                        [
                            'bookings' => $bookings, 
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );

     	//Record the booking in the database


            DB::table('asset_applications')->where('id', $request->asset_id)
                    ->update(
                        [
                        	                    
                            'username'  => $request->username,
                            'assetid'   => $request->asset_id,
                            'startdate' => $request->startdate,
                            'enddate'   => $request->enddate,                   

                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );


    }
}
