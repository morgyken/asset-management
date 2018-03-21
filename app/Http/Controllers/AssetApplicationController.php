<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AssetApplicationController extends Controller
{

	private $bookings = 0;


     public function Application(Request $request){
     	//Increase the number of booking 

     	$booking = DB::table('asset_models')->select('bookings','serial')->first();

     	$bookings = $booking->bookings + 1;


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
                        	                    
                            'username'  => 	$request->username,
                            'serial'   => 	$booking->serial,
                            'startdate' => 	$request->startdate,
                            'enddate'   => 	$request->enddate,                   

                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );

               return redirect()->route('show.asset', ['id'=> $request->asset_id])
        ->with('status', 'Allocation was Successful!');


    }
}
