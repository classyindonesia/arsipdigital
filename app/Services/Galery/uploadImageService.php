<?php 

namespace App\Services\Galery;

use App\Models\Mst\Galery;
use Illuminate\Http\Request;

class uploadImageService
{

	protected $request;
	private $uploadPath;

	public function __construct(Request $request)
	{
		$assetPath = '/upload/galery/';
		$this->uploadPath = public_path($assetPath);
		$this->request = $request;
	}



	public function handle()
	{
		
		$files =  $this->request->file('files');
		$results = [];
			foreach($files as $file){
				try {

					$nama_file = md5($file->getClientOriginalName().'_'.date('YmdHis')).'.jpg';
				 	$file->move($this->uploadPath, $nama_file);
				 	$name = $file->getClientOriginalName().' telah tersimpan! ';

				 	if($this->request->is_watermarked == 1){
				 		$this->applyWatermark($nama_file);
				 	}

				 	//create thumbnail
				 	$this->create_thumbnail($nama_file);

				 	//insert to db
				 	$data_insert = [
				 		'nama_file'	=> $nama_file,
				 		'mst_album_galery_id' => $this->request->mst_album_galery_id
				 	];
				 	Galery::create($data_insert);
				 	//end of insert to db
				}catch(Exception $e) {
			 		$name = $file->getClientOriginalName().' gagal tersimpan!';
				}				
			}
		$results[] = compact('name');
	 return array(
	        'files' => $results,
 	    );			
	}

	private function applyWatermark($nama_file)
	{
		$pathToFile = $this->uploadPath.'/'.$nama_file;
		$imgWatermarkPath = public_path('upload/'.env('NAMA_FILE_WATERMARK'));

		$img = \Image::make($pathToFile);
		// sisipkan file watermark
		$img->insert($imgWatermarkPath, env('SETTING_POSISI_WATERMARK'), 10, 10);
		// simpan file yg telah diberi watermark
		$img->save($pathToFile);		
	}


	private function create_thumbnail($nama_file){
		// create_thumbnail
		$img = \Image::make(public_path('upload/galery/'.$nama_file));
		// prevent possible upsizing
		$img->resize(340, null, function ($constraint) {
		    $constraint->aspectRatio();
		    $constraint->upsize();
		});
 		$img->save(public_path('upload/galery/thumbnail_'.$nama_file));
		// end of create_thumbnail		
	}



}