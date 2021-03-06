<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 Route::get('/', function () {
    return view('welcome');
});
*/
    Route::get('/', function () {
    return view ('welcome');
})->name('home');


Route::get('/clima', [
    'as' => 'clima',
    'uses' => 'postController@index'
]);

Route::group(['middleware'=>['web']],function(){
   
//    Route::get('/', function () {
//    return view ('welcome');
//})->name('home');

   Route::post('/signup' ,['uses'=>'userController@postSignUp', 'as'=>'signup']); 
   
   Route::post('/signin' ,['uses'=>'userController@postSignIn', 'as'=>'signin']); 
   
   Route::get('/dashboard',[
       'uses'=>'postController@getDashboard', 'as'=>'dashboard', 'middleware'=>'auth'
   ]);
   
   Route::post('/createpost', [
       'uses'=>'postController@postCreatePost',
       'as'=>'post.create',
       'middleware'=>'auth'
   ]);
   
   Route::get('/delete-post/{post_id}', [
       'uses'=>'postController@getDeletePost',
       'as'=>'post.delete',
       'middleware'=>'auth'
   ]);
   
   Route::get('/logout', [
       'uses'=>'userController@getLogout',
       'as'=>'logout'
   ]);

   Route::get('/account', [
      'uses'=>'userController@getAccount',
       'as'=> 'account'
   ]);

   Route::post('/updateaccount', [
      'uses'=>'userController@postSaveAccount',
       'as'=>'account.save'
   ]);

   Route::get('/userimages/{filename}', [
       'uses'=>'userController@getUserImage',
    'as'=>'account.image'
       ]);

   Route::post('/edit', [
'uses'=>'postController@postEditPost',
       'as'=>'edit'
   ]);

    Route::post('/like', [
        'uses'=>'postController@postLikePost',
        'as'=>'like'
    ]);

});