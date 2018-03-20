<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class RegisterAssetController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ShowAssetRegister()
    {
        return view('asset.register');
    }


    protected function RegisterAsset(Request $request)
    {        

    DB::table('asset_models')->insert(
            [        
            'name'        => $request['name'],
            'description' => $request['description'],
            'availability' => $request['availability'],
            'bookings'    => $request['bookings'],
            'status'     => $request['status'],
            'category' => $request['category'],
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

         ]);
        
    }

    
}
