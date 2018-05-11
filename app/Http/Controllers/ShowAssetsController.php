<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ShowAssetsController extends Controller
{
    public function index ()
    
    {
        $data = DB::table('asset_models')->get();

       //Show all assets

        return view('asset.all-assets', ['data' => $data] );
    }

    public function showAsset ($asset_id=4)
    {
        //select asset here 
        $asset = DB::table('asset_models')

        ->where('id', $asset_id)

        ->first();  


        //show names of applicants 

        $users = DB::table('asset_applications')

            ->select('username')

            ->where('serial', $asset->serial)

            ->get();

        //$users = (array) $users;

        return view ('asset.allocate', ['asset' => $asset, 'users'=> $users]);
    }

    //show allocations 

    public function showAllocations()
    {

        $data = DB::table('asset_models')
            ->join('lease_models', 'asset_models.serial', '=', 'lease_models.serial')
            ->where('lease_models.serial', '!=', null)
            ->get();

       //Show all assets

        return view('asset.allocations12', ['data' => $data] );
    }
}
