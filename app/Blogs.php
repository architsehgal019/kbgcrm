<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Blogs extends Model
{
    protected $fillable=[
    	'title', 'content', 'image',
    ];
}
