<?php

namespace App\Services\MyProfile;

use Repo\Contracts\Mst\UserRepoInterface;

class exportExcelProfileService
{

	protected $user;

	public function __construct(UserRepoInterface $user)
	{
		$this->user = $user;
	}

   private function nama_file($ekstensi = false)
    {
        $nama_file = str_slug('export_profile_'.date('Y-m-d H:i:s'));
        if($ekstensi == true){
            return $nama_file.'.xls';            
        }
        return $nama_file;
    }




    private function header_excel($sheet){
        $merge_judul = 'A1:P1';
        $arr_header_file = ['Nama', 'No Induk', 'Alamat', 'Tgl Lahir (dd-mm-yyyy)', 'tempat_lahir',
        		'jenis kelamin', 'no hp', 'kode pos', 'no telp', 'no ktp', 'nama ibu kandung',
        		'status ikatan', 'agama', 'kota', 'status pernikahan', 'homebase'
        ];
        $cells_tampilan_header_kolom = 'A2:P2'; 
        $konten_header_file = 'Data Profile';


        $sheet->mergeCells($merge_judul);
        $sheet->row(1, array(
             $konten_header_file
        ));
        $sheet->cells($merge_judul, function($cells){
           $cells->setFontSize(30);
        });
        $sheet->setHeight(1, 50);

        //row 2
        $sheet->setHeight(2, 20);        
        $sheet->row(2, $arr_header_file);
        $sheet->cells($cells_tampilan_header_kolom, function($cells){
           $cells->setBackground('#6FDD98');
           $cells->setFontColor('#000000');
        });   
        $sheet->setBorder($cells_tampilan_header_kolom, 'thin');
    }



    private function konten_excel($sheet, $mst_user_id){
    	$user = $this->user->find($mst_user_id);
		if(count($user->data_user)>0){
	        $d = $user->data_user;
	        $arr_konten_file = [
	        	$d->nama, $d->no_induk, $d->alamat, date('d-m-Y', strtotime($d->tgl_lahir)),
	        	$d->tempat_lahir, $d->fk__jenis_kelamin, $d->no_hp, $d->kode_post, 
	        	$d->no_telp, $d->no_ktp, $d->nama_ibu_kandung, $d->fk__ref_status_ikatan, 
	        	$d->fk__ref_agama, $d->fk__ref_kota, $d->fk__ref_status_pernikahan,
	        	$d->fk__ref_homebase 
	        ];
	        $sheet->row(3, $arr_konten_file);
	        $sheet->setHeight(3, 20);
		}        
    }    

 

    public function handle($mst_user_id)
    {
        \Excel::create($this->nama_file(), function($excel) use ($mst_user_id)  {
                $excel->sheet('Sheet1', function($sheet) use ($mst_user_id) {
                    $this->header_excel($sheet);
                    $this->konten_excel($sheet, $mst_user_id);
                });
        })->download('xls');

    }



}