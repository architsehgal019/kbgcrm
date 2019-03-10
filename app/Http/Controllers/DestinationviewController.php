<?php

namespace App\Http\Controllers;

use App\Destination;
use App\Subdestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use DateTime;

class DestinationviewController extends Controller
{
    public function index()
    {
    	$destination = Destination::all();
        return view('destinationview', compact('destination'));
    }
}
