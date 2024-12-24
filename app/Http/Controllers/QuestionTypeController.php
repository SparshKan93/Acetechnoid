<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuestionType;

class QuestionTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
        $data = QuestionType::all(); 
        return view('question-categories.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('question-categories.create'); //->with(['categories_types' => $categories_types]);
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
            // 'category_type'=>'required|min:1',
            'name'=>'required|min:1',
        ]);
        // dd($request->all());
        $result = QuestionType::create($request->all());
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
        $data = QuestionType::with('pages')->find($id); 

        // dd($data->pages->chunk(2)->toArray());

        return view('question-categories.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = QuestionType::find($id); 

        return view('question-categories.edit')->with(['data' => $data]);
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
        $result = QuestionType::destroy($id);
        if($result)
            return back()->with('success', 'Saved successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
        
    }
}
