<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::get('/test', 'HomeController@test')->name('test');

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/google', 'Auth\SocialMediaController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\SocialMediaController@handleCallback');

Route::get('auth/facebook', 'Auth\SocialMediaController@redirectToFacebook');
Route::get('auth/facebook/callback', 'Auth\SocialMediaController@handleCallback');

Route::get('myebook/mobile/style/icon/{filename}', function($filename){
    $path=  "flipbookjs/mobile/raw/".$filename;
    // $path = resource_path() . '/app/uploads/' . $filename;

    if(!File::exists($path)) {
        return response()->json(['message' => 'Image not found.'], 404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('myebook/key/{id}', 'EbookController@key_download');
Route::resource('myebook', 'EbookController');

Route::resource('testing', 'Api\ApiTestPaperController');

Route::resource('categories', 'CategoriesController');

Route::post('upload-pages', 'EbookPageController@upload_pages');
Route::resource('ebook-videos', 'EbookVideoController');

Route::resource('ebook-pages', 'EbookPageController');


Route::resource('generate-paper', 'PaperGeneratorController');

Route::resource('generate-paper-hindi', 'HindiPaperGeneratorController');

Route::get('test-paper/chap_que', 'TestPaperController@chap_wise_que');
Route::any('test-paper/set-format/{id}', 'TestPaperController@setPaperFormat')->name('test-paper.set-format');
Route::any('test-paper/final-que-paper/{id}', 'TestPaperController@finalQuePaper')->name('final-que-paper');
Route::resource('test-paper', 'TestPaperController');

//demo
Route::get('demo-test-paper/chap_que', 'DemoTestPaperController@chap_wise_que');
Route::resource('demo-test-paper', 'DemoTestPaperController');

Route::resource('question-categories', 'QuestionTypeController');
Route::resource('hindi-question-categories', 'HindiQuestionTypeController');

Route::resource('group-myebook', 'GroupController');

Route::resource('order', 'OrderController');

//Website
Route::get('/', 'WebsiteController@home');
Route::get('/home', 'WebsiteController@home')->name('home');
Route::get('/about-us', 'WebsiteController@about')->name('about');
Route::get('/download', 'WebsiteController@download')->name('download');
Route::get('/download/{val}', 'WebsiteController@downloadKey');
Route::get('/contact', 'WebsiteController@contact')->name('contact');
Route::get('/events', 'WebsiteController@events')->name('events');
Route::get('/news', 'WebsiteController@news')->name('news');
Route::get('/services', 'WebsiteController@services')->name('services');
Route::get('/product', 'WebsiteController@product')->name('product');
Route::get('/products/details', 'WebsiteController@productDetails')->name('products-details');


URL::forceScheme('https');
