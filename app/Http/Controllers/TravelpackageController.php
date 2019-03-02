<?php

namespace App\Http\Controllers;

use App\travelpackage;
use App\Destination;
use App\Subdestination;
use Illuminate\Http\Request;

class TravelpackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::all();
        $subdestinations = Subdestination::all();
        return view('travelpackage', compact('destinations', 'subdestinations'));
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
     * @param  \App\travelpackage  $travelpackage
     * @return \Illuminate\Http\Response
     */
    public function show(travelpackage $travelpackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\travelpackage  $travelpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(travelpackage $travelpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\travelpackage  $travelpackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, travelpackage $travelpackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\travelpackage  $travelpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(travelpackage $travelpackage)
    {
        //
    }
}
