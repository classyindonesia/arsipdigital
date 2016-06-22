<?php 

namespace App\Models\Mst;

use App\Models\Mst\Weblink;
use Illuminate\Database\Eloquent\Model as Eloquent;

class KategoriWeblink extends Eloquent {

	protected $fillable = ['nama'];
	protected $table = 'mst_kategori_weblink';
 


	public function mst_weblink()
	{
		return $this->hasMany(Weblink::class, 'mst_kategori_weblink_id');
	}
 



}