<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EbookVideo;

class EbookVideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $data = EbookVideo::all(); 
        return view('ebook-videos.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = \App\Ebook::all(); 
        return view('ebook-videos.create')->with(['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:1',
        ]);
        // dd($request->all());
        $result = EbookVideo::create($request->all());
        
        if($result){
            return back()->with('success', 'Saved Succefully!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = EbookVideo::with('pages')->find($id); 

        // dd($data->pages->chunk(2)->toArray());

        return view('ebook-videos.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EbookVideo::find($id); 

        return view('ebook-videos.edit')->with(['data' => $data]);
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
        $result = EbookVideo::destroy($id);
        if($result)
            return back()->with('success', 'Saved successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
        
    }
}
