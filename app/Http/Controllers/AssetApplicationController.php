<?php

namespace App\Http\Controllers;

use DB;

use Auth;

use Illuminate\Http\Request;

class AssetApplicationController extends Controller
{

	private $bookings = 0;


    public function Application(Request $request){
     	//Increase the number of booking 

     	$booking = DB::table('asset_models')->select('bookings','serial')

     	->where('id', $request->asset_id)

     	->first();

     	$bookings = $booking->bookings + 1;


     	//check if they have booked the same item

     	$data = DB::table('asset_applications')

     			->where('serial', $booking->serial)

     			->first();


		if($data == null)
		{
			DB::table('asset_models')->where('id', $request->asset_id)
                    ->update(
                        [
                            'bookings' => $bookings, 
                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );


        
     	//Record the booking in the database


            $book = DB::table('asset_applications')->insert(
                    
                        [
                        	                    
                            'username'  	=> 	$request->username,
                            'serial'   		=> 	$booking->serial,
                            'startdate' 	=> 	$request->startdate,
                            'userid'		=>   Auth::user()->id,
                            'enddate'   	=> 	$request->enddate,                   
                            'updated_at' 	=> \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );

             return redirect()->route('show.asset', ['id'=> $request->asset_id])
        ->with('status', 'Allocation was Successful!');
		}

		else
		{
		//return the page to show that they have already applied to the system

		return redirect()->route('show.asset', ['id'=> $request->asset_id])
        ->with('status', 'You have already applied for this asset!');
		
		}
        
    }
}
