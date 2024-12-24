<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebook;
use App\Group;
use App\Categories;

class EbookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',  ['except' => ['show', 'key_download']]);
    }

    public function index()
    { 
        $data = Ebook::all(); 
        return view('ebooks.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Categories::where('category_type', '1')->get(); 
        $classes = Categories::where('category_type', '2')->get(); 
        $groups = Group::all(); 
        $uid = Ebook::orderBy('id', 'desc')->first(); 
        if(empty($uid)) 
            $uid = 'WPH/EB/'.date('Ym').sprintf("/%04d", 1);
        else 
            $uid = 'WPH/EB/'.date('Ym').sprintf("/%04d", ++$uid->id);
        return view('ebooks.create')->with(['uid' => $uid, 'subjects' => $subjects, 'classes' => $classes, 'groups' => $groups]);
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
            'name'=>'required|min:1',
        ]);

        $result = Ebook::create($request->all());
        
        $uid = 'WPH/EB/'.date('Ym').sprintf("/%04d", $result->id);

        if(!empty($request->file('file_pdf')))
        {
            $image = $request->file('file_pdf');
            $image_name = $uid.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/ebook/'), $image_name);
        }
        
        if($result){
            return redirect()->route('ebook-pages.edit', [$result->id]);//->with(['id' => $data]);
            // return view('ebooks.show')->with(['data' => $data]);
            // return back()->with('success', 'Record added successfully! Your Challan ID:'.$result->uid);
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
        $data = Ebook::with('pages', 'videos')->find($id);
        if(isset($_GET["ch"])){
            $data["cur_vid"] = \App\EbookVideo::where('chap_num', $_GET["ch"])->where("ebook_id", $data->id)->first();
        }

        return view('ebooks.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Ebook::find($id); 
        $subjects = Categories::where('category_type', '1')->get(); 
        $classes = Categories::where('category_type', '2')->get();
        $groups = Group::all();
        return view('ebooks.edit')->with(['data' => $data, 'subjects' => $subjects, 'classes' => $classes, 'classes' => $classes, 'groups' => $groups]);
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
        $result = Ebook::updateOrCreate(['id' => $id],$request->all());
        if($result){
            return back()->with('success', 'Saved Succefully!');
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
      * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Ebook::destroy($id);

        if($result)
            return back()->with('success', 'Deleted successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
    }

    public function key_download($id)
    {
        $data = Ebook::find($id);

        return view('ebooks.key')->with(['data' => $data]);

        if($result)
            return back()->with('success', 'Deleted successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
    }
}
