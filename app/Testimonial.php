<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Testimonial extends Model
{
    protected $fillable=[
    	'name', 'package', 'comment', 'image',
    ];
}
