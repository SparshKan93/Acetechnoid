<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EbookPage;
use App\Categories;
use App\Series;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',  ['except' => ['welcome', 'test']]);
    }
    
    public function dashboard()
    {
        $date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
        $currentMonth = isset($_GET['month']) ? $_GET['month'] : date('m');
        $currentYear = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $created_by = isset($_GET['user']) ? $_GET['user'] : Auth::id();
        // $date = '2022-04-13';

        $sql_PG = \App\PaperGenerator::where('created_by', $created_by)->where('created_at', 'like', '%'.$date.'%');
        // $count_rows = $sql_PG->count();
        // $count_chapters = $sql_PG->groupBy('chapter_num')->get()->count();
        // dd($count_chapters);

        $sql_HPG = \App\HindiPaperGenerator::where('created_by', $created_by)->where('created_at', 'like', '%'.$date.'%');
        
        $loginLogs = \App\LoginLog::where('created_by', $created_by)
                                    ->where('created_at', 'like', '%'.$date.'%')
                                    ->orderBy('id', 'desc')
                                    ->get();

        $eBooks_count = \App\PaperGenerator::where('created_by', $created_by)
                                    ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                                    ->whereRaw('YEAR(created_at) = ?',[$currentYear])
                                    ->groupBy('ebook_id')->get()->count();

        $hBooks_count = \App\HindiPaperGenerator::where('created_by', $created_by)                    
                                    ->whereRaw('MONTH(created_at) = ?',[$currentMonth])
                                    ->whereRaw('YEAR(created_at) = ?',[$currentYear])
                                    ->groupBy('ebook_id')->get()->count();

        return view('dashboard')->with(['loginLogs' => $loginLogs, 'sql_PG' => $sql_PG, 'sql_HPG' => $sql_HPG, 'eBooks_count' => $eBooks_count, 'hBooks_count' => $hBooks_count]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('myebook'); //->action('EbookController');
        // return view('home');
    }

    public function welcome()
    {
        $data = Series::with('ebooks.page')->where('status', 1)->get();
        return view('testWelcome')->with(['data' => $data]);
    }

    public function test()
    {
        // OAuth Two Providers
        if(isset($token)){
            $token = $user->token;
            $refreshToken = $user->refreshToken; // not always provided
            $expiresIn = $user->expiresIn;
            // OAuth One Providers
            $token = $user->token;
            $tokenSecret = $user->tokenSecret;
            dd('ok Google');
        }
        else{
            dd('not ok Google');
        }
        

    }
}
