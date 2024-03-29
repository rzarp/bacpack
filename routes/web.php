<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Auth::routes();

Route::get('/', function () {
    return view('dashboard.dashboard');
});
Route::get('/home', 'HomeController@index')->name('home');


// admin
Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::get('/admin/user', 'UserController@index')->name('user');
Route::get('/show-user', 'UserController@show')->name('show-datauser');
Route::get('/input-user', 'UserController@create')->name('input-user');
Route::post('/user/tambah','UserController@store')->name('user.store');

Route::prefix('v1/qa')->group(function () {
    Route::get('/qa', [UserController::class, 'index_qa'])->name('v1.qa.qa.index_quest');
    Route::get('/qa/show', [UserController::class, 'show_qa'])->name('v1.qa.qa.show');
    Route::get('/qa/{id}', [UserController::class, 'destroy_qa'])->name('v1.qa.qa.destroy_qa');
});

Route::prefix('v1/ga')->group(function () {
    Route::get('/ga', [UserController::class, 'index_ga'])->name('v1.ga.ga.index_ga');
    Route::get('/show_ga', [UserController::class, 'show_ga'])->name('v1.ga.show_ga');
    Route::get('/ga/{id}', [UserController::class, 'destroy_ga'])->name('v1.ga.ga.destroy_ga');
});





// data thread (quest)
Route::get('/data', 'QuestController@data')->name('data.detail');
Route::get('/data/edit/{id}','QuestController@edit_quest')->name('data.edit');
Route::put('/data/edit/{id}','QuestController@update_quest')->name('quest.update');
Route::delete('/data/hapus/{id}','QuestController@destroy_data')->name('data.destroy');

Route::get('/blog/edit/{id}','QuestController@edit_blog')->name('blog.edit');
Route::put('/blog/edit/{id}','QuestController@update_blog')->name('blog.update');
Route::delete('/blog/hapus/{id}','QuestController@destroy_blog')->name('blog.destroy');

Route::get('/galeri/edit/{id}','QuestController@edit_galeri')->name('galeri.edit');
Route::put('/galeri/edit/{id}','QuestController@update_galeri')->name('galeri.update');
Route::delete('/galeri/hapus/{id}','QuestController@destroy_galeri')->name('galeri.destroy');

Route::get('/tour/edit/{id}','QuestController@edit_tour')->name('tour.edit');
Route::put('/tour/edit/{id}','QuestController@update_tour')->name('tour.update');
Route::delete('/tour/hapus/{id}','QuestController@destroy_tour')->name('tour.destroy');

// Tanya dan jawab


Route::get('/quest/{slug}','QuestController@detail_quest');
Route::get('/input/tanya','QuestController@index')->name('input.tanya');
Route::get('/input/quest','QuestController@inputquest')->name('input.quest');
Route::post('/quest/tambah','QuestController@storequest')->name('quest.store');
Route::post('/comment', 'QuestController@comment_quest');

// Blog
Route::get('/input/blog','QuestController@blog_index')->name('input.blog');
Route::get('/input/blogs','QuestController@inputblog')->name('blog.input');
Route::get('/blog/{slug}','QuestController@detail_blog');
Route::post('/blog/tambah','QuestController@storeblog')->name('blog.store');
Route::post('/commentblog', 'QuestController@comment_blog');

// Galeri 
Route::get('/input/galeri','QuestController@galeri_index')->name('input.galeri');
Route::get('/input/galeris','QuestController@inputgaleri')->name('galeri.input');
Route::get('/galeri/{slug}','QuestController@detail_galeri');
Route::post('/galeri/tambah','QuestController@storegaleri')->name('galeri.store');
Route::post('/commentgaleri', 'QuestController@comment_galeri');   

// tour
Route::get('/input/tour','QuestController@tour_index')->name('input.tour');
Route::get('/input/tours','QuestController@inputtour')->name('tour.input');
Route::get('/tour/{slug}','QuestController@detail_tour');
Route::post('/tour/tambah','QuestController@storetour')->name('tour.store');
Route::post('/commenttour', 'QuestController@comment_tour');   

// setting

Route::put('/user/updatesetting/{id}','QuestController@update_setting')->name('update.setting');
Route::get('/user/setting','QuestController@setting')->name('setting.user');
Route::get('/user/updatesetting/{id}','QuestController@edit_setting')->name('edit.setting');








