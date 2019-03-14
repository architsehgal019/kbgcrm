<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Auth;
use DateTime;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offer = DB::table('banners')->get();
        return view('specialoffers', compact('offer'));
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
            'alt_text' => 'required|string' 
        ]);
        return NULL;
    }

    protected function storeAction($data)
    {
        $cover = $data->file('offerimg_url');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));
        DB::table('banners')->insert([
            'image' => $cover->getFilename().'.'.$extension,
            'alt_text' => $data->alt_text,
            'created_at' => now(),
            'updated_at' => now(),
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
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if($request->hasFile('offer_img'))
        {
            $cover = $request->file('offer_img');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));    
            $file_name = $cover->getFilename().'.'.$extension;
        }
        else{
            $file_name = $request->imgname;
        }
        DB::table('banners')->where('id',$request->id)
            ->update([
                'alt_text' => $request->alt_text,
                'image' => $file_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('banners')->where('id', $id)->delete();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}
