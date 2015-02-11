<?php
Route::get('my_profile', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\MyProfileController@index',
	'as'			=> 'my_profile.index'
	]);

Route::post('my_profile/update', [
	'middleware'	=> 'auth',
	'uses'			=> 'Admin\MyProfileController@update',
	'as'			=> 'my_profile.update'
	]);

Route::get('my_profile/coba_upload',  function(){
	return view('coba_upload');
});

Route::post('my_profile/coba_upload',  
	['as' => 'coba_upload', 
	'uses' => function(Illuminate\Http\Request $request){

		$results = array();
		$files = $request->file('files');

			 foreach ($files as $file) {
			 	$name = $file->getClientOriginalName();
			 	$results[] = compact('name');
			 }

			 return array(
			        'files' => $results
			    );
		}
	]
);
