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
        if($availability->availability == 0)
        {
             $availability = 0;
        }

        else 
        {
               $availability = $availability->availability -1;
        }
     


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
                            'status' => 1, 
                            'availability' => $availability,

                            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                        ]
            );

            return redirect()->route('show.asset', ['id'=> $request->asset_id])
        ->with('status', 'Allocation was Successful!');

    }


}
