<?php 

namespace App\Services\MyProfile;

use Illuminate\Http\Request;

class uploadAvatarService
{

	protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

	public function handle()
	{
		$assetPath = '/upload/avatars';
		$uploadPath = public_path($assetPath);	
		$file =  $this->request->file('files');
		$results = [];

		try {
			$nama_file = md5(\Auth::user()->email).'.jpg';
		 	$file->move($uploadPath, $nama_file);
		 	
		 	$img = \Image::make($uploadPath.'/'.$nama_file);
			$img->resize(300, null, function ($constraint) {
			    $constraint->aspectRatio();
			});
			$img->save($uploadPath.'/'.$nama_file);

		 	$name = $file->getClientOriginalName().' telah tersimpan! ';
		}catch(Exception $e) {
	 		$name = $file->getClientOriginalName().' gagal tersimpan!';
	 		$results[] = compact('name');   
		}
		$results[] = compact('name');   
	 return array(
	        'files' => $results,
 	    );					
	}

}