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
        //dd($asset);

        $users = DB::table('users')->select('name')->get();

        return view ('asset.allocate', ['asset' => $asset, 'users'=> $users]);
    }
}
