<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Illuminate\Support\Facades\Input;


class RegisterAssetController extends Controller
{
    

    protected $redirectTo = '/register-asset';

    prtected $serial = 0;


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
    
        $file = Input::file('pic');

        $serial = rand(99999,999999);

        $path=  public_path().'/storage/uploads/'.$request->name;


        $dest = $path;
        
        foreach ($file as $files){

        $name =  $files->getClientOriginalName();

        $files->move($dest, $name);

        }

        // register the data to database

        'bookings'    => $request['bookings'],
            'status'     => $request['status'],


        DB::table('asset_models')->insert(
            [    
            'serial'    => $serial,  
            'pic'       =>$name,   
            'name'        => $request['name'],
            'description' => $request['description'],
            'availability' => $request['availability'],
            'category' => $request['category'],
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

         ]);

        DB::table('allocate_models')->insert(
            [    
           'serial'    => $serial,
            'created_at' =>\Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

         ]);

         return redirect()->route('get.asset');
        
    }

    
}
