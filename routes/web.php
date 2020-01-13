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


Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/', 'FrontedController@acasa');
Route::get('/contact', 'FrontedController@contact')->name('contact');
Route::post('/anunturi', 'SearchController@search');
Route::get('/anunturi', 'FrontedController@ads');
Route::get('/anunturi/{id}', 'FrontedController@singleAd');
Route::get('/anunturi/utilizator/{id}', 'FrontedController@userAds');



// Menu pages variations
Route::get('/garsoniere', 'SearchController@garsoniere');
Route::get('/garsoniere-de-inchiriat', 'SearchController@garsoniereInchiriat');
Route::get('/garsoniere-de-vanzare', 'SearchController@garsoniereVanzare');
Route::get('/apartamente', 'SearchController@apartamente');
Route::get('/apartamente-de-vanzare', 'SearchController@apartamenteVanzare');
Route::get('/apartamente-de-inchiriat', 'SearchController@apartamenteInchiriat');
Route::get('/case', 'SearchController@case');
Route::get('/case-de-vanzare', 'SearchController@caseVanzare');
Route::get('/case-de-inchiriat', 'SearchController@caseInchiriat');



Route::post('/contact', 'ContactMailController@sendContact');






Route::group(['middleware' => ['auth']], function() {

    Route::resource('admin/posts', 'PostsController');

    Route::get('/admin', 'AdminController@index')->name('admin');

    Route::get('/admin/profile', 'AvatarController@profile')->name('users.profile');
    Route::post('/admin/profile', 'AvatarController@update_avatar')->name('users.profile');


    Route::group(['middleware' => ['admin']], function() {

        Route::resource('admin/users', 'UsersController');

        Route::get('/admin/remove-admin/{userId}', 'UsersController@removeAdmin');
        Route::get('/admin/give-admin/{userId}', 'UsersController@giveAdmin');

        Route::get('/admin/remove-premium/{userId}', 'UsersController@removePremium');
        Route::get('/admin/give-premium/{userId}', 'UsersController@givePremium');


    });


});


