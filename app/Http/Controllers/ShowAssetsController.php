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
}
