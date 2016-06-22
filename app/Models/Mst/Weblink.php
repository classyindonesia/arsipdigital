<?php 

namespace App\Models\Mst;

use App\Models\Mst\KategoriWeblink;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Weblink extends Eloquent 
{

	protected $fillable = ['nama', 'mst_kategori_weblink_id', 'url'];
	protected $table = 'mst_weblink';
 


	public function mst_kategori_weblink()
	{
		return $this->belongsTo(KategoriWeblink::class, 'mst_kategori_weblink_id');
	}
 



}