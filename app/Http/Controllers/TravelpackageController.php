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

    protected function storeValidator($data)
    {
        $data->validate([
            'package_name' => 'required|string' 
        ]);
        return NULL;
    }

    protected function storeAction($data)
    {
        $cover = $data->file('img_url');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));

        $rand_package_code = $data->destination."".mt_rand(0, 10000);
        DB::table('travelpackages')->insert([
            'package_id' => $rand_package_code,
            'destination_id' => $data->destination,
            'subdestination_id' => $data->subdestination,
            'package_name' => $data->package_name,
            'days' => $data->days,
            'nights' => $data->nights,
            'price' => $data->price,
            'package_img' => $cover->getFilename().'.'.$extension,
            'created_at' => now(),
            'updated_at' => now(),
            'alt_text' => $data->alt_txt,
        ]);

        for($i=1; $i<=$data->hidden; $i++)
        {
            $n = "day".$i;
            $m = "daydesc".$i;
            DB::table('itinerary')->insert([
                'package_id' => $rand_package_code,
                'itinerary_title' => $data->$n,
                'itinerary_description' => $data->$m,
                'created_at' => now(),
                'updated_at' => now(),
            ]);    
        }

        DB::table('inclusion')->insert([
            'package_id' => $rand_package_code,
            'inclusion' => $data->inclusion,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('exclusion')->insert([
            'package_id' => $rand_package_code,
            'exclusion' => $data->exclusion,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        for($j=1; $j<=$data->hotelcount; $j++)
        {
            $type = "hoteltype".$j;
            $name = "hotelname".$j;
            $address = "hoteladdress".$j;
            DB::table('hotels')->insert([
                'package_id' => $rand_package_code,
                'hotel_category' =>$data->$type,
                'hotel_name' => $data->$name,
                'hotel_place' => $data->$address,
                'created_at' => now(),
                'updated_at' => now()
            ]);    
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invalid = $this->storeValidator($request);
        if(!empty($invalid))
        {
            $request->session()->flash('flashFailure', $invalid);
            return redirect()->back()->withInput($request->input());
        }
        $this->storeAction($request);
        return redirect()->back();       
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
