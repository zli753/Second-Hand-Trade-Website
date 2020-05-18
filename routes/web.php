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

Route::group(['middleware'=>['web']], function(){
    Route::get('/', function(){
    return view('welcome');
    })->name('home');
    
    //sign up and login
    Route::post('/signup', [
        'uses'=>'UserController@postSignUp',
        'as'=>'signup'
    ]);
    Route::post('/signin', [
        'uses'=>'UserController@postSignIn',
        'as'=>'signin'
    ]);
    
    
    Route::get('/dashboard',[
        'uses'=>'GoodController@getDashboard',
        'as'=>'dashboard',
        'middleware'=>'auth'
    ]);
    //create goods posts
    Route::post('/creategood',[
        'uses'=>'GoodController@goodCreateGood',
        'as'=>'good.create',
        'middleware'=>'auth'
    ]);
    
    //display delete and edit goods
    Route::post('/editgoodAction/{good_id}',[
        'uses'=>'GoodController@editgoodAction',
        'as'=>'good.editAction'
    ]);
	Route::get('/mainboard',[
        'uses'=>'GoodController@getMainboard',
        'as'=>'mainboard'
    ]);
    
    Route::get('/editgood/{good_id}',[
        'uses'=>'GoodController@getEditGoods',
        'as'=>'good.edit'
    ]);
    
    Route::get('/deletegood/{good_id}',[
        'uses'=>'GoodController@getDeleteGoods',
        'as'=>'good.delete',
        'middleware'=>'auth'
    ]);
    
    Route::get('/getGoodMap/{good_address}',[
        'uses'=>'GoodController@getGoodMap',
        'as'=>'good.map'
    ]);
    
    
    //logout
     Route::get('/logout',[
        'uses'=>'UserController@logout',
        'as'=>'logout'
    ]);
    
    //create question
    Route::post('/createquestions/{good_id}',[
        'uses'=>'QuestionsController@createquestions',
        'as'=>'question.create'
    ]);
    
    //display delete and edit question
    Route::get('/getquestions/{good_id}',[
        'uses'=>'QuestionsController@getquestions',
        'as'=>'question.getquestions'
    ]);
	
	//display the comment
	Route::get('/getrates/{good_userid}',[
        'uses'=>'RatesController@getrates',
        'as'=>'rate.getrates'
    ]);
	
	//create rate
	Route::post('/createrates/{user_id}',[
        'uses'=>'RatesController@createrates',
        'as'=>'rate.create'
    ]);
    
    Route::get('/editquestion/{question_id}/{good_id}',[
        'uses'=>'QuestionsController@getEditQuestion',
        'as'=>'question.edit'
    ]);
    
    Route::post('/editquestionAction/{question_id}/{good_id}',[
        'uses'=>'QuestionsController@editquestionAction',
        'as'=>'question.editquestionAction'
    ]);
    
    Route::get('/deletequestion/{question_id}/{good_id}',[
        'uses'=>'QuestionsController@getDeleteQuestion',
        'as'=>'question.delete'
    ]);
    
    //display goods by category
    Route::get('/mainboard/furniture',[
        'uses'=>'GoodController@getFurniture',
        'as'=>'getFurniture'
    ]);
    Route::get('/mainboard/Electronics',[
        'uses'=>'GoodController@getElectronics',
        'as'=>'getElectronics'
    ]);
    Route::get('/mainboard/book',[
        'uses'=>'GoodController@getBook',
        'as'=>'getBook'
    ]);
    Route::get('/mainboard/other',[
        'uses'=>'GoodController@getOther',
        'as'=>'getOther'
    ]);
    
    Route::post('/getSearchedGood/',[
        'uses'=>'GoodController@getSearchedGood',
        'as'=>'good.search'
    ]);
    
    
});

