<?php
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

/**
 * Main tasks panel
 */
Route::get('/', function () {
    $posts = Post::orderBy('created_at', 'desc')->get();

    return view('index', [
        'posts'     =>$posts,
        'menu_cat'  =>'news'
    ]);
});

Route::group(['middleware'=>'auth'], function(){

    /**
     * Create post panel
     */
    Route::get('/create', function () {


        return view('create', [
            'menu_cat'  =>'news'
        ]);
    });

    Route::post('/create-post', function (Request $request) {

        $validator = Validator::make($request->all(), [
            'post_title'    => 'required|max:250',
            'post_content'  => 'required',
        ]);

        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $post = new Post;
        $id = Auth::id();
        $post->post_author  = $id;
        $post->post_title   = $request->post_title;
        $post->post_content = $request->post_content;
        $mytime = Carbon\Carbon::now();
        $post->created_at   = $mytime->toDateTimeString();
        $post->updated_at   = $mytime->toDateTimeString();
        $post->save();

        return view('create', [
            'menu_cat'  =>'news'
        ]);
    });

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
