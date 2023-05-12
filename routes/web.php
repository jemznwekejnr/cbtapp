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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'testController@welcome');

Auth::routes();

Route::get('/home', 'testController@welcome');

Route::get('/instructions', 'testController@Instructions');

Route::get('/testpage', 'testController@testPage');

Route::get('/result', 'testController@Result');

Route::get('/resultdetails', 'testController@resultDetails');

Route::get('addquestions', 'questionController@addQuestions');

Route::post('submitquestion', 'questionController@submitQuestion');

Route::post('starttest', 'testController@starttest');

Route::post('submitcbt', 'testController@submitCbt');

Route::get('newaccount', 'questionController@newaccount');

Route::get('previoustest', 'questionController@previoustest');

Route::post('createaccount', 'questionController@createaccount');

Route::get('users', 'questionController@users');

Route::get('manageuser', 'questionController@manageuser');

Route::post('updateaccount', 'questionController@updateaccount');

Route::get('passwordreset', 'questionController@passwordreset');

Route::post('updatepassword', 'questionController@updatepassword');

Route::get('checkusertest', 'testController@checkusertest');

Route::get('downloadpdf', 'testController@downloadpdf');

Route::get('emailresult', 'testController@emailresult');

Route::get('adminemailresult', 'testController@adminemailresult');


