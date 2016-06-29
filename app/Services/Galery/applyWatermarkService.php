<?php 

namespace App\Services\Galery;

class applyWatermarkService 
{

 
	/**
	 * menerapkan watermark pada file gambar
	 * @param  string $pathToRawFile         lokasi file yg hendak diberi watermark
	 * @param  string $pathToWatermarkedFile lokasi file watermark yg akan tersimpan
	 * @return null                        
	 */
	public function handle($pathToRawFile, $pathToWatermarkedFile)
	{
		$imgWatermarkPath = public_path('upload/'.env('NAMA_FILE_WATERMARK'));
		$img = \Image::make($pathToRawFile);
		// sisipkan file watermark
		$img->insert($imgWatermarkPath, env('SETTING_POSISI_WATERMARK'), 10, 10);
		// simpan file yg telah diberi watermark
		$img->save($pathToWatermarkedFile);					
	}


}