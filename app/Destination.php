<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Destination extends Model
{
    protected $fillable=[
    	'name', 'bannerimg', 'popular',
    ];
}
