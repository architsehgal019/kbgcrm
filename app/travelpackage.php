<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class travelpackage extends Model
{
    protected $fillable=[
    	'package_id', 'destination_id', 'subdestination_id', 'package_name', 'days', 'nights', 'price', 'package_img', 'honeymoon_package',
    ];
}
