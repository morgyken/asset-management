<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaseModel extends Model
{
    use Notifiable;
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

 
    protected $dateFormat = 'Y/m/d H:i:s';
    protected $connection = 'mysql';


    private $database = 'lease_models';
    
    protected $fillable = [
        'username', 'assetid', 'startdate', 'enddate'
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
