<?php

namespace App\Http\Controllers;

use App\travelpackage;
use App\Destination;
use App\Subdestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;

class PackageeditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $package = travelpackage::where('package_id', $id)->get();
        $itinerary = DB::table('itinerary')->where('package_id', $id)->get();
        $inclusion = DB::table('inclusion')->where('package_id', $id)->get();
        $exclusion = DB::table('exclusion')->where('package_id', $id)->get();
        $hotel = DB::table('hotels')->where('package_id', $id)->get();
        $destinations = Destination::all();
        $subdestinations = Subdestination::all();
        return view('packageedit', compact('id', 'package', 'itinerary', 'inclusion', 'exclusion', 'hotel', 'destinations', 'subdestinations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
