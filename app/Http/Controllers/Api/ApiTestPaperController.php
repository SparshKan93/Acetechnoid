<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestPaper;

class ApiTestPaperController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth',  ['except' => ['show']]);
    }

    public function index()
    {   
        dd('hi');
        $subjects = Ebook::select('subject')->groupBy('subject')->get();
        foreach ($subjects as $key => $value) {
            $data[$value->subject] = Ebook::where('subject', $value->subject)->get();
        }
        
        return view('test-paper.index')->with(['data' => $data, 'subjects' => $subjects]);
    }

    public function store(Request $request)
    {
        $response = json_decode($request->data, true);

        $result = TestPaper::insert($response);
        
        return json_encode($result);

        // $value = $request->session()->pull('key', 'default');
        // $request->session()->flash('success', 'Record added successfully!');
        // $request->session()->put('key', 'value');
        // $request->session()->push('user.teams', 'developers');
        // $request->session()->forget('key');
		// $request->session()->flush();
    
    }
}
