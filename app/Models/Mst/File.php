<?php 

namespace App\Models\Mst;

use App\Models\Mst\Arsip;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Intervention\Image\Facades\Image; 

class File extends Eloquent {

	protected $fillable = ['nama_file_asli', 'nama_file_tersimpan', 
					'mst_arsip_id', 'mst_user_id', 'size'];
	protected $table = 'mst_file';


	public function mst_arsip()
	{
		return $this->belongsTo(Arsip::class, 'mst_arsip_id');
	}



	/* identifikasi ekstensi file yg diupload
	output : 
		1=gambar
		2=pdf
		3=lain2
	 */
	public function get_jenis_eksternsi($nama_file)
	{

		$is_gambar = 0;
		$is_pdf = 0;
		$is_lain = 0;


		$ext_file_asli = explode(".", $nama_file);
		$ext1 = $ext_file_asli[count($ext_file_asli) - 1];


	 	$ekstensi_gambar = explode(",", env('EKSTENSI_GAMBAR'));
		for($i=0;$i<=count($ekstensi_gambar)-1;$i++){
			if(strcasecmp($ext1, trim($ekstensi_gambar[$i])) == 0){
				$is_gambar = $is_gambar+1;
			}
		}

		$ekstensi_pdf = explode(",", env('EKSTENSI_PDF'));
		for($i=0;$i<=count($ekstensi_pdf)-1;$i++){
			if(strcasecmp($ext1, trim($ekstensi_pdf[$i])) == 0){
				$is_pdf = $is_pdf+1;
			}
		}

		if($is_pdf != 0){
			return 2;
		}elseif($is_gambar != 0){
			return 1;
		}else{
			return 3;
		}

	}


	/*
	handle file saat upload,
	menentukan mana yg diberi watermark dan tidak
	 */
	public function handle_file($nama_file)
	{
		$jenis_ekstensi = $this->get_jenis_eksternsi($nama_file);
		if($jenis_ekstensi == 1){
			//jika gambar, maka insert ke tabel watermark+create new gambar
			$img = Image::make(public_path('/upload/arsip/').$nama_file)
				->insert(public_path('upload/').env('NAMA_FILE_WATERMARK'), env('SETTING_POSISI_WATERMARK'), 10, 10)
				->save(public_path('/upload/arsip/watermark/').$nama_file);
		}
	}


	public function remove_watermark_file($nama_file)
	{
		$assetPath = '/upload/arsip/watermark';
		$uploadPath = public_path($assetPath);
		$path_file = $uploadPath.'/'.$nama_file;
		if(file_exists($path_file)){
			unlink($path_file);
		}		
	}

}