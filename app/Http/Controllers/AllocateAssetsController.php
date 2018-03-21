<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class AllocateAssetsController extends Controller
{

    //select count of assets


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function AllocateAsset(Request $request)
    {

        //select the number of asset available

         $availability = DB::table('asset_models')

            ->select('availability')
            -> where('id', $request->asset_id)
            ->first();

        ///When allocating reduce availability by one

        $availability = $availability -1;


            DB::table('lease_models')->where('id', $request->asset_id)
                    ->update(
                        [
                           
                            'username'  => $request->username,
                            'assetid'   => $request->asset_id,
                            'startdate' => $request->startdate,
                            'enddate'   => $request->enddate,                    

                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );

            DB::table('asset_models')->where('id', $request->asset_id)
                    ->update(
                        [
                            'status' => 'allocated', 
                            'availability' => $availability,

                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
                    );


    }

   
}
