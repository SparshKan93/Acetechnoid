<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebook;
use App\EbookPage;

class EbookPageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
        
        $uid = 'TBP/EB/'.date('Ym').sprintf("/%04d", $result->id);

        if(!empty($request->file('file_pdf')))
        {
            $image = $request->file('file_pdf');
            $image_name = $uid.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/ebook/'), $image_name);
        }
        
        if($result){
            return back()->with('success', 'Record added successfully! Your Challan ID:'.$result->uid);
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
        $data = Ebook::find($id);

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
        $data = Ebook::with('pages')->find($id);
        return view('ebook-pages.edit')->with(['data' => $data]);
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
        EbookPage::destroy($id);

        return redirect()->back()->with('success', 'Record deleted successfully!');
    }

    public function upload_pages(Request $request)
    {       
        if($request->hasFile('file'))
        {
            if (!is_dir(public_path('uploads/ebook/ebook-'.$request->ebook_id))) {
                mkdir(public_path('uploads/ebook/ebook-'.$request->ebook_id), 0777);
            }
            
            $image = $request->file('file');
            $image_name = str_replace(' ', '-', $image->getClientOriginalName());
            
            $fullName = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $onlyName = explode('.'.$extension,$fullName)[0];
            $onlyname2 = ltrim($onlyName, '0') ?: '0'; 
            // $onlyname2 = str_replace([' '], '', $request->question);
            $image_name2 = $onlyname2.'.'.$extension;

            $image->move(public_path('uploads/ebook/ebook-'.$request->ebook_id), $image_name2);
            
            $request->request->add(['title' => $image_name2, 'position' => $onlyName]);

            $result = EbookPage::where(['ebook_id' => $request->ebook_id, 'title' => $request->title ])->first();
            if($result)
                return $result;
            else
            $result = EbookPage::create($request->all());
        
            return $result;
        }

        return 'Success';
    }
}
