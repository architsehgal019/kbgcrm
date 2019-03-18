<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Subdestination extends Model
{
  	protected $fillable=[
    	'destination_id', 'subdestination_name', 'popular',
    ];  
}
