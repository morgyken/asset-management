<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class ShowAssetsController extends Controller
{
    public function index ()
    
    {
        $data = DB::table('asset_models')->get();

        dd($data);

        return view('asset.all-assets', ['data' => $data] );
    }
}
