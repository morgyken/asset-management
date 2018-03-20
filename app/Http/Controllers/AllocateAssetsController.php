<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class AllocateAssetsController extends Controller
{
    public function allocateAsset(Request $request, $asset_id, $user_id)
    {
        DB::table('lease_models')-> insert([
            'username'=> $request->username,
            'assetid' => $request->assetid,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate

        ]  );

    }
}
