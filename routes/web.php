<?php
use App\Post;
use App\Album;
use App\Photo;
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
    $posts = Post::orderBy('created_at', 'desc')-> paginate(20);

    return view('post/index', [
        'posts'     =>$posts,
        'menu_cat'  =>'news'
    ]);
});

/**
 * Whole post
 */
Route::get('/post/{post}', function (Post $post) {

    return view('post/post', [
        'post'     =>$post,
        'menu_cat'  =>'news'
    ]);
});

//Show all albums
Route::get('/album', function (){
    $albums = Album::orderBy('created_at', 'desc')-> paginate(20);

    return view('photo/albums', [
        'menu_cat'  =>'photo',
        'albums'    => $albums,
    ]);
});

//Show photo from one album
Route::get('/album/{album}', function (Album $album){
    // I'm not sure if this is correct... If you see this and can explain what's wrong - write to me on https://goo.gl/Cx46Rg
    $photos = Photo::where('album_id', $album->album_id)-> paginate(20);
    //$photo = Album::orderBy('created_at', 'desc')->photo();
    // TODO: добавление фотографий в альбомы
    // TODO: добавление альбомов
    // TODO: загрузка файлов на сервер и проверка на размер, расширение файла, mine-типы (https://phpclub.ru/talk/threads/%D0%9F%D1%80%D0%BE%D0%B2%D0%B5%D1%80%D0%BA%D0%B0-%D1%84%D0%B0%D0%B9%D0%BB%D0%B0-%D0%BF%D0%BE-mime-type-%D0%BF%D1%80%D0%B8-%D0%B7%D0%B0%D0%B3%D1%80%D1%83%D0%B7%D0%BA%D0%B5-%D0%B8%D0%B7-%D1%84%D0%BE%D1%80%D0%BC%D1%8B.77558/)

    return view('photo/photos', [
        'menu_cat'  =>'photo',
        'photos'    => $photos,
    ]);
});

Route::group(['middleware'=>'auth'], function(){

    /**
     * Create post panel
     */
    Route::get('/create', function () {
        $post = new Post;
        $post->post_id = 0;
        $post->post_title = "";
        $post->post_content = "";
        return view('post/create', [
            'menu_cat'  =>'news',
            'post'      => $post,
        ]);
    });

    /**
     * Edit existing post
     */
    Route::get('/create/{post}', function (Post $post) {


        return view('post/create', [
            'menu_cat'  =>'news',
            'post'      => $post,
        ]);
    });

    Route::delete('/delete-post/{post}', function (Post $post) {
        $post->delete();

        return redirect('/');
    });

    /**
     * Write post to DB
     */
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

        if($request->id != 0)
        {
            $post = Post::find($request->id);
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $mytime = Carbon\Carbon::now();
            $post->updated_at = $mytime->toDateTimeString();
            $post->save();
        }
        else {

            $post = new Post;
            $id = Auth::id();
            $post->post_author = $id;
            $post->post_title = $request->post_title;
            $post->post_content = $request->post_content;
            $mytime = Carbon\Carbon::now();
            $post->created_at = $mytime->toDateTimeString();
            $post->updated_at = $mytime->toDateTimeString();
            $post->save();
        }
        return redirect('/');
    });

});
Auth::routes();


/*Route::get('/home', 'HomeController@index')->name('home');*/
Route::get('/home', function () {
    return redirect('/');
});
