<?php 

namespace App\Models\Mst;

use App\Models\Mst\Folder;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Rak extends Eloquent 
{

	protected $fillable = ['nama', 'kode_rak', 'keterangan'];
	protected $table = 'mst_rak';


	public function mst_folder()
	{
		return $this->hasMany(Folder::class, 'mst_rak_id');
	}
 



	public function keygen()
	{
		$key = '';
		$length = 10;
		list($usec, $sec) = explode(' ', microtime());
		mt_srand((float) $sec + ((float) $usec * 100000));
	   	$inputs = array_merge(range(1,9),range('A','H'), range('J', 'K'), range('M', 'N'), range('Q', 'Z'));
	   	for($i=0; $i<$length; $i++){
	   		$get = $inputs[array_rand($inputs)];
	   	    $key .= $get; 

		}
 		return $key;
	}




	public function setKodeRakAttribute($kode_rak)
	{ 
		$keygen = $this->keygen();
		$cek = Rak::whereKodeRak($keygen)->first();
		while(count($cek)>0){
			$keygen = $this->keygen();
		}
		$this->attributes['kode_rak'] = $this->keygen();
	}






}