<?php 
Route::get('rss', [
	'as'	=> 'frontend_feed.rss',
	'uses'	=> 'Publik\FeedController@rss'
]);

Route::get('feed', [
	'as'	=> 'frontend_feed.index',
	'uses'	=> 'Publik\FeedController@generate'
]);