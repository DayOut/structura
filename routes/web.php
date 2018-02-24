<?php
use App\Post;
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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Main tasks panel
 */
Route::get('/index', function () {
    $posts = Post::orderBy('created_at', 'asc')->get();

    return view('index', [
        'posts'=>$posts
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
