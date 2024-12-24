<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemoPaperGenerator;
use App\Categories;
use App\Ebook;
// use App\TestPaper;

class DemoTestPaperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',  ['except' => ['create']]);
    }

    public function index()
    {   
        $subjects = Ebook::select('subject')->groupBy('subject')->get();
        foreach ($subjects as $key => $value) {
            // $value->subject;
            $data[$value->subject] = Ebook::where('subject', $value->subject)->get();
        }
        // dd($data);
        // $data = Ebook::all();
        
        return view('demo-test-paper.index')->with(['data' => $data, 'subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if($_GET) {
           $ebook_id = '17';
           $ebook = Ebook::where(['id' => $ebook_id])->first();
           $chapters = DemoPaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $ebook_id])->orderBy('chapter_num', 'asc')->groupBy('chapter', 'chapter_num')->get();
           $data = DemoPaperGenerator::where(['ebook_id' => $ebook_id, 'chapter_num' => '1'])->orderBy('section')->get();
           // dd($chapters);
            return view('demo-test-paper.create')->with(['data' => $data, 'chapters' => $chapters, 'ebook' => $ebook]);
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
        $this->validate($request,[
            'name'=>'required|min:1',
        ]);

        $result = DemoPaperGenerator::create($request->all());
        
        $uid = 'WPH/EB/'.date('Ym').sprintf("/%04d", $result->id);

        if(!empty($request->file('file_pdf')))
        {
            $image = $request->file('file_pdf');
            $image_name = $uid.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/ebook/'), $image_name);
        }
        
        if($result){
            return redirect()->route('ebook-pages.edit', [$result->id]);//->with(['id' => $data]);
            // return view('paper-generator.show')->with(['data' => $data]);
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
        dd(explode("-",$id));
        $data = DemoPaperGenerator::with('pages')->find($id); 
        return view('paper-generator.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
        $data = DemoPaperGenerator::find($id); 
        $subjects = Categories::where('category_type', '1')->get(); 
        $classes = Categories::where('category_type', '2')->get();
        return view('paper-generator.edit')->with(['data' => $data, 'subjects' => $subjects, 'classes' => $classes]);
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
        $result = DemoPaperGenerator::destroy($id);
        if($result)
            return back()->with('success', 'Deleted successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
    }

    public function chap_wise_que(){
        if($_GET) {
           $ebook_id = $_GET['ebook'];
           $chapter_num = $_GET['chapter'];
           $data = DemoPaperGenerator::select('id', 'question')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])->orderBy('section')->get();
        }
        return json_encode($data);
        // dd($data);
        // dd($ebook_id.$chapter_num);
    }
}
