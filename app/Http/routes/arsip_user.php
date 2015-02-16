<?php

Route::get('arsip_user', [
	'middleware'	=> 'hanya_staff',
	'uses'			=> 'Admin\ArsipUserController@index',
	'as'			=> 'arsip_user.index'
	]);

