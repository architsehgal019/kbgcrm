<?php

namespace App\Http\Controllers;

use App\Subdestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;

class SubdestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'subdestination_name' => 'required|unique:subdestinations,subdestination_name|string' 
        ]);
        
    }

    protected function storeAction($data)
    {
        $cover = $data->file('subdestimg_url');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));

        Subdestination::insert([
            'destination_id' => $data->subdestination,
            'subdestination_name'=>$data->subdestination_name,
            'popular' => $data->popular_destination,
            'subdestinationimg' => $cover->getFilename().'.'.$extension,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
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
     * @param  \App\Subdestination  $subdestination
     * @return \Illuminate\Http\Response
     */
    public function show(Subdestination $subdestination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subdestination  $subdestination
     * @return \Illuminate\Http\Response
     */
    public function edit(Subdestination $subdestination)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subdestination  $subdestination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subdestination $subdestination)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subdestination  $subdestination
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subdestination $subdestination)
    {
        //
    }
}
