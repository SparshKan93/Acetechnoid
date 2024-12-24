<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Ebook;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',  ['except' => ['show']]);
    }

    public function index()
    { 
        $data = Group::all(); 
        return view('group-myebook.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('group-myebook.create');
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
            'name'=>'required|unique:groups|min:1|max:20',
        ]);

        $result = Group::create($request->all());
        
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
        $array = explode("gp-",$id); 
        $data = Ebook::where(['group_id' => $array[0] ])
                        ->where('subject', 'like', '%'.$array[1])
                        ->orderBy('standard', 'ASC')
                        ->get(); 
        return view('group-myebook.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Group::find($id); 

        return view('group-myebook.edit')->with(['data' => $data]);
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
        $result = QuestionType::updateOrCreate(
                                            ['id' => $id],
                                            $request->all()
                                        );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = Group::destroy($id);
        if($result)
            return back()->with('success', 'Saved successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
        
    }
}
