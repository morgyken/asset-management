<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssetModel extends Model
{
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';


    private $database = 'asset_models';
    
    protected $fillable = [
        'name', 'description', 'availability', 'bookings', 'status', 'category'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];
}
