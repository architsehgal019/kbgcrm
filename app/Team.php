<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Team extends Model
{
    protected $fillable=[
    	'name', 'designation', 'image',
    ];
}
