<?php

Route::get('emails', [
	'middleware'	=> 'hanya_admin',
	'uses'			=> 'Admin\EmailController@index',
	'as'			=> 'emails.index'
	]);

