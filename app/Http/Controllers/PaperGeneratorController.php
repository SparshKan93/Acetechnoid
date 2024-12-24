<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use DataTables;
use App\PaperGenerator;
use App\Categories;
use App\Ebook;
use App\QuestionType;

class PaperGeneratorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function index()
    { 
        // if(isset($_GET['server-side'])){
            return view('paper-generator.index-server-side')->with(['data' => PaperGenerator::paginate(10)]);
        // }
        // return view('paper-generator.index')->with(['data' => PaperGenerator::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Ebook::all();

        $que_type = QuestionType::all();
        $result = PaperGenerator::where('created_by', Auth::id())->orderBy('id', 'desc')->first();

        return view('paper-generator.create')->with(['que_type' => $que_type, 'books' => $books, 'result' => $result]);
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
        
        // $que_type = QuestionType::updateOrCreate(['name' => $request->que_type],['name' => $request->que_type]);
        // $request->request->add(['question' => trim($val)."</p>"]);

        foreach($que_arr as $key => $val){
            $question = $val;
            $temp = preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches);
            if(preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches) == 1){
                $val = PaperGeneratorController::base64ImgSave($val);
            }
            // dd(trim($val)."</p>");
            str_replace('<p></p>', '', $val);
            // str_replace('<div></p>', '', $val);
            $request->request->add(['question' => preg_replace('/^\s*<[^>]+>\s*|\s*<\/[^>]+>\s*\z/', '', $val."</p>")]);

            $request->request->add(['answer' => preg_replace('/^\s*<[^>]+>\s*|\s*<\/[^>]+>\s*\z/', '', $ans_arr[$key])."</p>"]);
            if($request->question != "")
            $result = PaperGenerator::create($request->all());
        }

        // $result = PaperGenerator::create($request->all());
        
        if($result){
            $ebook = Ebook::find($request->ebook_id);
            $books = Ebook::all();
            $que_type = QuestionType::all();

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
        // $data = PaperGenerator::with('pages')->find($id); 
        // return view('paper-generator.show')->with(['data' => $data]);

            $data = PaperGenerator::select('paper_generators.id', 'ebooks.name AS ebook', DB::raw("CONCAT(chapter_num,'. ',chapter) AS chapter_num"), 'question', 'answer')
                                    ->leftJoin('ebooks', 'paper_generators.ebook_id', 'ebooks.id')
                                    ->get();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function($row){
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
        $data = PaperGenerator::find($id); 
        $books = Ebook::all();
        // dd($data);
        $que_type = QuestionType::all();

        return view('paper-generator.edit')->with(['que_type' => $que_type, 'books' => $books, 'data' => $data]);
        
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
        // $result = PaperGenerator::updateOrCreate(['id' => $id],$request->all());
        
        if(!empty($request->file('diagrams')))
        {
            $uid = date('Ym').sprintf("/%04d", $result->id);
            $image = $request->file('file_pdf');
            $image_name = $uid.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/ebook/testpaper'), $image_name);
        }
        
        // $que_arr = explode(";;", $request->question ); 
        // $ans_arr = explode(";;", $request->answer );
        // foreach($que_arr as $key => $val){
            $question = $request->question;
            $temp = preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches);
            if(preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $question, $matches) == 1){
                $val = PaperGeneratorController::base64ImgSave($val);
            }
            // dd(trim($val)."</p>");
            $request->request->add(['question' => trim($request->question)]);

            $request->request->add(['answer' => trim($request->answer)]);
            if($request->question != "")
            $result = PaperGenerator::updateOrCreate(['id' => $id],$request->all());
                        // $result = PaperGenerator::create($request->all());

        // }

        $ebook = Ebook::find($request->ebook_id);
        // $result = PaperGenerator::create($request->all());
        
        if($result){
            $books = Ebook::all();
            $que_type = QuestionType::all();

            return back()->with(['que_type' => $que_type, 'books' => $books, 'result' => $result, 'success' => 'Record added successfully!']);
        }
        else{
            return back()->with('error', 'Something went wrong!');
        }   
        
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
        $result = PaperGenerator::destroy($id);
        if($result)
            return back()->with('success', 'Deleted successfullly!');
        
        else
            return back()->with('error', 'Something went wrong!');
    }

    static function base64ImgSave($imgHtml)
    {
        // $subject = $request->question;
        preg_match('/<img\s.*?\bsrc="(.*?)".*?>/si', $imgHtml, $matches); 

        $img = $matches[1];
        $dest = 'uploads/test-paper-imgs/';
        $destination = public_path($dest);

        $pos  = strpos($matches[1], ';');
        $type = explode('/', substr($matches[1], 0, $pos))[1];
 
        $img = str_replace('data:image/'.$type.';base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $imgName = date('YmdHi').rand ( 10000 , 99999 ).'-img.'.$type;
        file_put_contents($destination.$imgName, $data);
        return str_replace($matches[1],'/'.$dest.$imgName,$imgHtml);
    }
}
