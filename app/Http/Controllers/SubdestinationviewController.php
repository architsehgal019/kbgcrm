<?php

namespace App\Http\Controllers;
use App\Destination;
use App\Subdestination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubdestinationviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_destination = Destination::all(); 
        $subdestination = Subdestination::all();
        return view('subdestinationview', compact('subdestination', 'all_destination'));
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
    public function update(Request $request)
    {
        if($request->hasFile('subdestination_img'))
        {
            $cover = $request->file('subdestination_img');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension, File::get($cover));    
            $file_name = $cover->getFilename().'.'.$extension;
        }
        else{
            $file_name = $request->imgname;
        }

        DB::table('subdestinations')->where('id',$request->id)
            ->update([
                'destination_id' => $request->destination,
                'subdestination_name' => $request->subdestination_name,
                'popular' => $request->popular_destination,
                'subdestinationimg' => $file_name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

        return redirect()->back();
    }
    public function delete($id)
    {
        DB::table('subdestinations')->where('id', $id)->delete();
        return redirect()->back();
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
