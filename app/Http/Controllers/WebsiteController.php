<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebook;
use App\EbookPage;
use App\Categories;
use App\Series;

class WebsiteController extends Controller
{
    public function home()
    {
        $boss_books = Ebook::with('page')->where('series', 'Avni Publishers')->inRandomOrder()->limit(10)->get();
        $amazing_books = Ebook::with('page')->where('series', 'Other')->inRandomOrder()->limit(10)->get();
        $youtube = \App\EbookVideo::inRandomOrder()->limit(20)->get();

        return view('avani.index')->with(['series_1' => $amazing_books,'series_2' => $boss_books, 'youtube' => $youtube]); 
    }

    public function downloadKey($value)
    {
        if(isset($_GET['key'])){
            $subjects = Ebook::select('subject as name')
                        ->where('series', $value)
                        ->where('key_link', '!=', null)
                        ->distinct()
                        ->get();
            return view('avani.subjects')->with(['subjects' => $subjects, 'title' => $value]); 
        }
        if(isset($_GET['subject'])){
            $book_key = Ebook::where('series', $value)
                        ->where('subject', str_replace('-', ' ',$_GET['subject']))
                        ->where('key_link', '!=', null)
                        ->distinct()
                        ->get();
            return view('avani.subjects')->with(['book_key' => $book_key, 'title' => $value]);
        }
        
        return back();
    }

    public function productDetails()
    {
        if(isset($_GET['ebook_id'])) {
            $ebook = Ebook::with('page')->where(['id' => $_GET['ebook_id']])->first();
            if (empty($ebook)) {
                return redirect('products');
            }
        }
        else{
            return redirect('products');
        }

        return view('avani.product-details')->with(['data' => $ebook]);
    }

    public function download()
    {
        $data = Ebook::where('key_link', '!=', 'NULL')->get();
        return view('avani.download')->with(['data' => $data]);
    }

    public function contact()
    {
        if(isset($_POST)){
            
        }
        return view('avani.contact');//->with(['data' => $data]);
    }

    public function product()
    {

        if(isset($_GET['s'])){
            $subjects = Ebook::select('subject as name')
                        // ->where('series', $_GET['s'])
                        ->distinct()
                        ->get();

            $standard = Ebook::select('standard as name')
                        // ->where('series', $_GET['s'])
                        ->whereBetween('standard', ['1', '8'])
                        // ->orderByRaw('(standard +0) ASC ,standard ASC')
                        ->distinct()
                        ->get();

            return view('avani.product')->with(['data' => $_GET['s'], 'subjects' => $subjects, 'standard' => $standard]);
        }
        else{

            $sr = isset($_GET['sr'])? $_REQUEST['sr']:' ';
            $std = isset($_GET['std'])? $_REQUEST['std']:' ';
            $sub = isset($_GET['sub'])? $_REQUEST['sub']:' ';

            $data = isset($_GET['sr'])?$_GET['sr']:'Product';
            $data = isset($_GET['sub'])?$data.'-'.$_GET['sub']:$data;

            $books = Ebook::with('page')
                            ->orWhere([ 'standard' => $std, 'subject' => $sub])
                            ->where('series', $sr)
                            ->get();
                            // ->toSql(); dd($sub);
        }

        return view('avani.product')->with(['data' => $data, 'books' => $books]);
    }

    public function news()
    {
        $data = Series::with('ebooks.page')->where('status', 1)->get();
        return view('avani.news')->with(['data' => $data]);
    }

    public function about()
    {
        return view('avani.about');
    }


}
