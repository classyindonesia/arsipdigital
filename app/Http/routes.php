<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 

 
Route::controllers([
	'password' => 'Auth\ResetPasswordsController',
]);


Route::get('q', function(){
	for($i=1;$i<=20;$i++){
	 	$data = [];
		Mail::queue('emails.pesan', $data, function($message){
		    $message->to('rey.barrolz@gmail.com', 'reka prihatanto')->subject('Welcome!');
		}); 
	}
		return 'ok';	
	});