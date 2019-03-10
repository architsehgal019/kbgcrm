<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class About extends Model
{
    protected $fillable=[
    	'aboutcontent', 'foundername', 'founderimg', 'foundermsg',
    ];
}
