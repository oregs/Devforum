<?php

use Illuminate\Support\Facades\Route;
use App\Events\OrderStatus;

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

// Class Order {

//     public $id;

//     public function __construct($id){
//         $this->id = $id;
//     }
// }

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('test', function () {
//     event(new App\Events\StatusLiked('Someone'));
//     return "Event has been sent!";
// });


Route::get('/', function () {
    $threads = App\Thread::paginate(15);
    return view('welcome', compact('threads'));
});

Auth::routes();
Route::resource('/thread','ThreadController');
Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/thread', 'ThreadController@index')->name('thread.index');
