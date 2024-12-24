<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ebook;
use App\EbookPage;
use App\Categories;
use App\Series;

class AjantaBooksInternationalController extends Controller
{
    public function home()
    {
        $amazing_books = Ebook::with('page')->where('series', 'Amazing')->inRandomOrder()->limit(20)->get();
        $boss_books = Ebook::with('page')->where('series', 'Boss')->inRandomOrder()->limit(20)->get();

        return view('ajantabooksinternational.home')->with(['amazing_books' => $amazing_books,'boss_books' => $boss_books,]); 
    }

    public function downloadKey($value)
    {
        if(isset($_GET['key'])){
            $subjects = Ebook::select('subject as name')
                        ->where('series', $value)
                        ->where('key_link', '!=', null)
                        ->distinct()
                        ->get();
            return view('ajantabooksinternational.subjects')->with(['subjects' => $subjects, 'title' => $value]); 
        }
        if(isset($_GET['subject'])){
            $book_key = Ebook::where('series', $value)
                        ->where('subject', str_replace('-', ' ',$_GET['subject']))
                        ->where('key_link', '!=', null)
                        ->distinct()
                        ->get();
            return view('ajantabooksinternational.subjects')->with(['book_key' => $book_key, 'title' => $value]);
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

        return view('ajantabooksinternational.product-details')->with(['data' => $ebook]);
    }

    public function download()
    {
        $data = Ebook::where('key_link', '!=', 'NULL')->get();
        return view('ajantabooksinternational.download')->with(['data' => $data]);
    }

    public function contact()
    {
        if(isset($_POST)){
            
        }
        return view('ajantabooksinternational.contact');//->with(['data' => $data]);
    }

    public function product()
    {

        if(isset($_GET['s'])){
            $subjects = Ebook::select('subject as name')
                        ->where('series', $_GET['s'])
                        ->distinct()
                        ->get();

            $standard = Ebook::select('standard as name')
                        ->where('series', $_GET['s'])
                        ->whereBetween('standard', ['1', '8'])
                        // ->orderByRaw('(standard +0) ASC ,standard ASC')
                        ->distinct()
                        ->get();

            return view('ajantabooksinternational.product')->with(['data' => $_GET['s'], 'subjects' => $subjects, 'standard' => $standard]);
        }
        else{

            $sr = isset($_GET['sr'])? $_GET['sr']:' ';
            $std = isset($_GET['std'])? $_GET['std']:' ';
            $sub = isset($_GET['sub'])? $_GET['sub']:' ';

            $data = isset($_GET['sr'])?$_GET['sr']:'Product';
            $data = isset($_GET['sub'])?$data.'-'.$_GET['sub']:$data;
            $books = Ebook::with('page')
                            ->orWhere([ 'standard' => $std, 'subject' => $sub])
                            ->where('series', $sr)
                            ->get();
                            // ->toSql();
        }

        return view('ajantabooksinternational.product')->with(['data' => $data, 'books' => $books]);
    }

    public function news()
    {
        $data = Series::with('ebooks.page')->where('status', 1)->get();
        return view('ajantabooksinternational.news')->with(['data' => $data]);
    }

    public function about()
    {
        return view('ajantabooksinternational.about');
    }


}
