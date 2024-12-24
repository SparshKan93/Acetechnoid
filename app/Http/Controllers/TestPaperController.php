<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaperGenerator;
use App\HindiPaperGenerator;
use App\Categories;
use App\Ebook;
use App\TestPaper;

class TestPaperController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth',  ['except' => ['create', 'update', 'chap_wise_que', 'index']]);
    }

    public function index()
    {   
        $data = [];
        $subjects = Ebook::select('subject')->groupBy('subject')->get();
        if(isset($_GET['series'])){
            $subjects = Ebook::select('subject')->where('series', $_REQUEST['series'])->groupBy('subject')->get();
            foreach ($subjects as $key => $value) {
            $data[$value->subject] = Ebook::where('subject', $value->subject)
                                            ->where('series', $_REQUEST['series'])
                                            ->orderBy('name')
                                            ->orderBy('standard')
                                            ->get();
            }
            return view('test-paper.index')->with(['data' => $data, 'subjects' => $subjects]);
        }
        return view('test-paper.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if($_GET) {
            $ebook_id = $_GET['ebook'];

            $ebook = Ebook::where(['id' => $ebook_id])->first();

            if (session('testpaper')) {
                $value = $request->session()->pull('testpaper');
                dd($value);
            }
        
            switch (strtolower($ebook->subject)) {
                case "hindi": 
                case "sanskrit": 
                case "hindi vyakaran":
                    $chapters = HindiPaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $ebook_id])->groupBy('chapter', 'chapter_num')->orderBy('chapter_num')->get();
                    $data = HindiPaperGenerator::where(['ebook_id' => $ebook_id, 'chapter_num' => '1'])->orderBy('section')->get();
                    break;

                default:
                    $chapters = PaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $ebook_id])->groupBy('chapter', 'chapter_num')->orderBy('chapter_num')->get();
                    $data = PaperGenerator::where(['ebook_id' => $ebook_id, 'chapter_num' => '1'])->orderBy('section')->get();
            }

            return view('test-paper.create')->with(['data' => $data, 'chapters' => $chapters, 'ebook' => $ebook]);
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
        // $temp = json_decode($request->data);
        $response = json_decode($request->data, true);

        $result = TestPaper::insert($response);

        return json_encode($result);

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
        dd(explode("-",$id));
        $data = PaperGenerator::with('pages')->find($id); 
        return view('paper-generator.show')->with(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        dd($request->input());
        $data = PaperGenerator::find($id); 
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
        // dd($id);
        // dd($request->chapters);
        // $data = PaperGenerator::where(['ebook_id' => $id])->whereIn('chapter_num' , $request->chapters)->orderBy('que_type', 'asc')->get();

        $chapters = PaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $id])->groupBy('chapter', 'chapter_num')->orderBy('chapter_num')->get();

        $data = TestPaper::queTypeAuto($request->chapters, $id);

        // dd($data->toArray());

        return view('test-paper.edit')->with(['data' => $data, 'ebook' => Ebook::find($id), 'chapters' => $chapters]);
        
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

    public static function chap_wise_que()
    {
        if($_GET) {

            $ebook_id = $_GET['ebook'];
            $chapter_num = $_GET['chapter']; 
            $subject = $_GET['subject'];

            switch (strtolower($subject)) {
                case "hindi": 
                case "sanskrit": 
                case "hindi vyakaran":
                    $data = HindiPaperGenerator::all_que_type($chapter_num, $ebook_id);
                    break;
                default:
                    $data = PaperGenerator::que_type($chapter_num, $ebook_id);
            }
            
            // $data = PaperGenerator::que_type($chapter_num, $ebook_id);
            // $phone = PaperGenerator::with('que_type')->find(1)->toArray(); 
            // $data = PaperGenerator::join('question_types','paper_generators.que_type','question_types.id')
            //     ->select(
            //           'paper_generators.id',
            //           'paper_generators.question',
            //           'question_types.name as que_type',
            //           'question_types.id as que_type_id'
            //     )
            //     ->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])->orderBy('section')->get();
           // $data = PaperGenerator::select('id', 'question', 'que_type')->with('que_type')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])->orderBy('section')->get();
        }
        return json_encode($data);
    }

    public function setPaperFormat(Request $request, $id)
    {
        $ebook_details = \App\Ebook::find($id);

        switch (strtolower($ebook_details->subject)) {
            case "hindi": 
            case "sanskrit": 
            case "hindi vyakaran":
                $chapters = HindiPaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $id])->groupBy('chapter', 'chapter_num')->orderBy('chapter_num')->get();
        
                $chapters_selected = $request->chapters;

                $data = HindiPaperGenerator::queTypeAuto($request->chapters, $id);
                break;
            default:
                $chapters = PaperGenerator::select('chapter', 'chapter_num')->where(['ebook_id' => $id])->groupBy('chapter', 'chapter_num')->orderBy('chapter_num')->get();
        
                $chapters_selected = $request->chapters;

                $data = PaperGenerator::queTypeAuto($request->chapters, $id);
        }

        return view('test-paper.edit')->with(['data' => $data, 'ebook' => Ebook::find($id), 'chapters_selected' => $chapters_selected, 'chapters' => $chapters]);
    }
    
    public function finalQuePaper(Request $request, $ebook_id)
    {   
        $ebook_details = \App\Ebook::find($ebook_id);

        switch (strtolower($ebook_details->subject)) {
            case "hindi": 
            case "sanskrit": 
            case "hindi vyakaran":
                $data = HindiPaperGenerator::finalPaper($ebook_id, $request->chapters, $request->question);

                $chapters = HindiPaperGenerator::select('chapter', 'chapter_num')
                                ->where([
                                    'ebook_id' => $ebook_id,
                                            ])
                                ->groupBy('chapter', 'chapter_num')
                                ->orderBy('chapter_num')
                                ->get();
                break;
            default:
                $data = PaperGenerator::finalPaper($ebook_id, $request->chapters, $request->question);

                $chapters = PaperGenerator::select('chapter', 'chapter_num')
                        ->where([
                            'ebook_id' => $ebook_id,
                                    ])
                        ->groupBy('chapter', 'chapter_num')
                        ->orderBy('chapter_num')
                        ->get();
        }

        return view('test-paper.final-paper')->with(['data' => $data, 'ebook' => Ebook::find($ebook_id), 'chapters' => $chapters]);
    }

}
