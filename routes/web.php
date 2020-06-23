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



// This routes for admin dashboard

Route::prefix('admin')->namespace('Dashboard')->middleware('admin')->group( function() {
    
    Route::get('/','Home@index')->name('admin.home');

    Route::resource('users', 'Users')->except(['show']);
     
    Route::resource('categories', 'Categories')->except(['show']);

    Route::resource('skills', 'Skills')->except(['show']);

    Route::resource('tags', 'Tags')->except(['show']);

    Route::resource('pages', 'Pages')->except(['show']);
    
    Route::resource('videos', 'Videos')->except(['show']);

    Route::resource('messages', 'Messages')->only(['index' , 'edit' , 'destroy']);

    Route::post('messages/replay/{id}', 'Messages@replay')->name('message.replay');
     
    // Here is the routes for the comments
    Route::post('comments', 'Videos@commentStore')->name('comment.store');

    Route::get('comments/{comment}', 'Videos@commentDelete')->name('comment.delete');
   
    Route::post('comments/{comment}', 'Videos@commentUpdate')->name('comment.update');
});
//Route::get('/admin/home' , 'Dashboard\Home@index');

Auth::routes();

// This routes for any users to access
Route::get('/home', 'HomeController@index')->name('home');

Route::get('category/{category}', 'HomeController@category')->name('front.category');

Route::get('skill/{skill}', 'HomeController@skill')->name('front.skill');

Route::get('video/{video}', 'HomeController@video')->name('frontend.video');

Route::get('tag/{tag}', 'HomeController@tag')->name('front.tag');

Route::post('contact-us', 'HomeController@messageStore')->name('contactUs.store');

Route::get('/', 'HomeController@welcome')->name('frontend.landing');

Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');

Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');




// This routes for authenticated users
// Only authenticated user will create or update comment
Route::middleware('auth')->group( function() {

    Route::post('comments/{comment}', 'HomeController@commentUpdate')
    ->name('front.commentUpdate');

    Route::post('comments/{video}/create', 'HomeController@commentStore')
    ->name('front.commentStore');

    Route::post('profile', 'HomeController@profileUpdate')->name('profile.update');

});