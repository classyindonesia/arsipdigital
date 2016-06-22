<?php 

namespace App\Models\Mst;

use App\Models\Mst\AksesStaff;
use App\Models\Mst\Arsip;
use App\Models\Mst\File;
use App\Models\Mst\Folder;
use App\Models\Mst\Rak;
use App\Models\Mst\User;
use App\MyPackages\QueryFilters\Filterable;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Carbon\Carbon;

class Arsip extends Eloquent 
{
	use Filterable;

	protected $fillable = ['nama', 'kode_arsip', 'keterangan', 
						'mst_folder_id', 'mst_user_id', 'tgl_arsip',
						'tgl_surat', 'no_surat', 'nama_tujuan'
						];
	protected $table = 'mst_arsip';
	protected $appends = ['c__waktu_pembuatan'];


	public function getCWaktuPembuatanAttribute()
	{
        if(isset($this->attributes['created_at'])){
            Carbon::setLocale('id');
            $now = $this->attributes['created_at'];
            $now = date('Y-m-d H:i:s', strtotime($now));
            $wkt = Carbon::createFromFormat('Y-m-d H:i:s', $now)
                         ->diffForHumans();
            return $wkt;            
        }		
	}

	public function mst_folder()
	{
		return $this->belongsTo(Folder::class, 'mst_folder_id');
	}

	public function mst_file()
	{
		return $this->hasMany(File::class, 'mst_arsip_id');
	}

	public function mst_user()
	{
		return $this->belongsTo(User::class, 'mst_user_id');
	}

 


 	/*fungsi untuk set kode arsip menjadi [kode-rak]-[nomor urut] */
	public function set_kode_arsip($mst_folder_id)
	{
		$folder = Folder::find($mst_folder_id);
       	$rak = Rak::find($folder->mst_rak_id);
		$get_kode_arsip = Arsip::where('kode_arsip', 'like', $rak->kode_rak.'%')
				->orderBy('id', 'DESC')
				->first();
		if(count($get_kode_arsip)>0){
			//jika sudah ada record
			$arr_kode_rak = explode("-", $get_kode_arsip->kode_arsip);
			$kode_rak = $arr_kode_rak[0]; //get index pertama
			$urut_akhir = $arr_kode_rak[1]; //get no urut dr index ke 2
		}else{
			//jika blm ada record sama sekali
			$urut_akhir = 0;
		}
		$urut_akhir = $urut_akhir+1;
        if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
        if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
        if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
        if($urut_akhir < 10000) $urut_akhir = '0'.$urut_akhir;
 
		return $rak->kode_rak."-".$urut_akhir;
	}


	/* 
		fungsi : digunakan agar saat insert, 
		value=mst_folder_id, 
		otomatis jika masuk ke db, langsung dlm bentuk kode arsip 
	*/
	public function setKodeArsipAttribute($mst_folder_id)
	{
 		$kode_arsip = $this->set_kode_arsip($mst_folder_id);
		$this->attributes['kode_arsip'] = $kode_arsip;
	}




	public function akses_staff()
	{
		return $this->belongsTo(AksesStaff::class, 'mst_user_id', 'mst_user_id');
	}







}