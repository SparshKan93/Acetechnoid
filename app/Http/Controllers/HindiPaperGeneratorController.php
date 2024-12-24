<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\HindiPaperGenerator;
use App\Categories;
use App\Ebook;
use App\HindiQuestionType;

class HindiPaperGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    {
        return view('paper-generator-hindi.index-server-side')->with(['data' => HindiPaperGenerator::paginate(10)]);

        $data = HindiPaperGenerator::all(); 
        return view('paper-generator-hindi.index')->with(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Ebook::all();

        $que_type = HindiQuestionType::all();
        $result = HindiPaperGenerator::where('created_by', Auth::id())->orderBy('id', 'desc')->first();

        return view('paper-generator-hindi.create')->with(['result' => $result, 'que_type' => $que_type, 'books' => $books]);

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
            'question'=>'required|min:1',
        ]);

        if(!empty($request->file('diagrams')))
        {
            $uid = date('Ym').sprintf("/%04d", $result->id);
            $image = $request->file('file_pdf');
            $image_name = $uid.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/ebook/testpaper'), $image_name);
        }
        
        $que_arr = explode(";;", $request->question );
        $ans_arr = explode(";;", $request->answer );
        
        //  dd($que_arr);
        foreach($que_arr as $key => $val){
            $question = $val;
            $temp = preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches);
            if(preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches) == 1){
                $val = PaperGeneratorController::base64ImgSave($val);
            }
            // dd(trim($val)."</p>");
            $request->request->add(['question' => "<p>".preg_replace('/^\s*<[^>]+>\s*|\s*<\/[^>]+>\s*\z/', '', $val)."</p>"]);

            $request->request->add(['answer' => "<p>".preg_replace('/^\s*<[^>]+>\s*|\s*<\/[^>]+>\s*\z/', '', $ans_arr[$key])."</p>"]);
            if($request->question != "")
            $result = HindiPaperGenerator::create($request->all());
        }

        $ebook = Ebook::find($request->ebook_id);
        // $result = PaperGenerator::create($request->all());
        
        if($result){
            $books = Ebook::all();
            $que_type = HindiQuestionType::all();
            return back()->with(['que_type' => $que_type, 'books' => $books, 'result' => $result, 'success' => 'Record added successfully!']);
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
        $data = HindiPaperGenerator::select('hindi_paper_generators.id', 'ebooks.name AS ebook', DB::raw("CONCAT(chapter_num,'. ',chapter) AS chapter_num"), 'question', 'answer', 'que_type')
                                    ->leftJoin('ebooks', 'hindi_paper_generators.ebook_id', 'ebooks.id')
                                    ->get();
        return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    // $btn = '<a href="javascript:void(0)" class="edit-btn btn btn-primary btn-sm">View</a>';
                    $btn = '<button class="edit-btn btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>';
                    $btn .= '<button onclick="return confirm(\'Are you sure you want to Delete?\');" type="submit" class="delete-btn btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></button>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = HindiPaperGenerator::find($id); 
        $books = Ebook::all();
        $que_type = HindiQuestionType::all();

        return view('paper-generator-hindi.edit')->with(['que_type' => $que_type, 'books' => $books, 'data' => $data]);
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
        $this->validate($request,[
            'question'=>'required',
        ]);

        $result = HindiPaperGenerator::updateOrCreate(['id' => $id],$request->all());

        if($result){
            return back()->with('success', 'Record added successfully!');
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
        $result = HindiPaperGenerator::destroy($id);
        if($result)
            return back()->with('success', 'Deleted successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
    }
}
