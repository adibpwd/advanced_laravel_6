<?php

use Illuminate\Support\Facades\Route;
use App\PostcardSendingService;
use Illuminate\Support\Facades\Mail;
use App\Postcard;
use App\newsAPI\Newsapi;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostNotif;
use App\Notifications\CommentNotif;
use App\Post;
use App\User;
use App\Comment;
use App\Notifications;

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

Route::get('pay', 'PayOrderController@store');

Route::get('channels', 'ChannelController@index');
Route::get('posts/create', 'PostController@create');
Route::get('pipeline', 'PostController@pipeline');

Route::get('polymorphic', 'PolymorphicController@index');
Route::post('polymorphic', 'PolymorphicController@store');
Route::get('polymorphic-view', 'PolymorphicController@index')->defaults('view', 'view');

Route::get('/test', 'PayOrderController@testing');

Route::get('postcards', function () {

    $postcardService = new PostcardSendingService('indonesia', 5, 10);

    $postcardService->hello('selamat malam kakak', 'adibtambak@gmail.com'); 

    // Mail::raw('Text', function ($message){
    //     $message->to('adibtambak@gmail.com');
    // });

});

Route::get('/facades', function () {
    Postcard::hello('semgangat belajar', 'adibtambak@gmail.com');
});

Route::get('news', function () {
    $result = Newsapi::searchTitleDate('indonesia', '2020-06-26');
    $post = json_decode($result);

    foreach ($post->articles as $key => $value) {
        echo $value->author . '<br>';
        echo $value->description . '<br><hr>';
    }
    
});

Route::get('/macros', function () {
    dd(Str::prefix('181818188181818393', 'ADIB-'));
    // dd(Str::partNumber('181818188181818393'));
});

Route::get('/macros1', function () {
    dd(Response::errorJson('error dikarenakan ada masalah..perbaiki sekarang'));
});

Route::get('allpost', 'PostController@all');

Route::get('onepost/{idpost}', 'PostController@onepost');
Route::get('onepost/{idpost}/update', 'PostController@update');




Route::get('/post-chunk', 'PostController@chunkPost');


Route::get('/post-cursor', 'PostController@cursorPost');

Route::get('/post-php-generator', 'PostController@phpGenerator'); // buat 100 data post

Route::get('10-post-awal', 'PostController@Post10');

Route::get('/delete-post/{id}/', 'PostController@destroy');

Route::get('/trash-post', 'PostController@trash');

Route::get('/restore-post/{id}', 'PostController@restore');

Route::get('/test-mail/{table}/{id}', function ($table, $id){

    $user = User::find(1)->first();
    
    if($table == 'post')
    {
        $post = Post::where('id', $id)->first();
        $post['username'] = $user['name'];
        $user->notify(new PostNotif([
            $table => $post,
            ]));
        
    } else if($table == 'comment') 
    {
        $comment = Comment::find($id)->first();
        $user->notify(new CommentNotif([$table => $comment]));
    }

    // dd($notif);

    

    return 'Sent';
});

Route::get('read', function () {
    $notif = Notifications::select(['id_notif', 'type', 'read_at'])->where('notifiable_id', 1)->get();
    // dd($notif);
    return view('notif', compact('notif'));
});

Route::get('/read/{id}', function ($id) {
    $notif = Notifications::select(['id_notif', 'type', 'notifiable_id', 'data', 'read_at'])->where('id_notif', $id)->get();
    $notifby = substr($notif[0]['type'], 18);
    $data = json_decode($notif[0]['data']);
    
    if($notifby == 'CommentNotif') 
    {
        $user = User::where('id', $data->data->commentable_id)->first();
        echo 'dari ' . $user['name'] . '<br> ';
        $notifby = 'komen';
    } 
    else 
    {
        $notifby = 'post barumu';
    }


    echo $notifby . ' = ' . $data->data->body;
});

// Notification::route('slack', env('SLACK_HOOK'))
//       ->notify(new PostNotif());

// Route::get('slack', function () {
//     $notif = Notification::
// });