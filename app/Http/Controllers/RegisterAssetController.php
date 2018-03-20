<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Illuminate\Support\Facades\Input;


class RegisterAssetController extends Controller
{
    protected $redirectTo = '/register-asset';


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


        $path=  public_path().'/storage/uploads/'.$request->name;


        $dest = $path;
        
        foreach ($file as $files){

        $name =  $files->getClientOriginalName();

        $files->move($dest, $name);

        }

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

         return redirect()->route('get.asset');
        
    }

    
}
