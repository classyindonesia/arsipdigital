<?php 
Route::get('rss', function(){
	return redirect()->to('/feed');
});

Route::get('feed', [
	'as'	=> 'frontend_feed.index',
	'uses'	=> 'Publik\FeedController@generate'
]);