<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Banner extends Model
{
	protected $fillable=[
    	'image', 'alt_text', 
    ];    
}
