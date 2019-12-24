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
use App\Board;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    $boards = Board::where('delete_at', '>', time())->orderBy('created_at', 'desc')->get();
    return view('front-page', ['boards' => $boards]);
});
Route::post('/gone', 'FrontController@sort_gone');
Route::post('/new', 'FrontController@sort_new');
Route::post('/favorite', 'FrontController@sort_fav');
Route::get('/new-board', 'NewboardController@index');

Route::get('/article/{id}', function($id){
    $currentBoard = Board::find($id);
    if($currentBoard->delete_at < time()){
        return redirect('/');
    }
    return view('article', ['board' => $currentBoard]);
});
Route::post('/create', function(Request $request){
    $validator = $request->validate([
        'kind' => 'required|integer',
        'title' => 'required',
        'description' => 'required',
        'day_time' => 'integer|nullable',
        'hour_time' => 'integer|nullable',
        'min_time' => 'integer|nullable',
    ]);
    // if ($validator->fails()) {
    //     return redirect('/new-board')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    
    $board = new Board;
    $board->kind = $request->kind;
    $board->title = $request->title;
    $board->text = $request->description;
    $delete_time = set_delete_time($request->day_time, $request->hour_time, $request->min_time);
    $board->delete_at = $delete_time;
    $board->save();

    return redirect('/');
    
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
