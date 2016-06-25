<?php 

namespace App\Services\StaffAkses;

use Repo\Contracts\Mst\AksesStaffRepoInterface;

class exportStaffUserService 
{
	protected $akses_staff;

	public function __construct(AksesStaffRepoInterface $akses_staff)
	{
		$this->akses_staff = $akses_staff;
	}


   private function nama_file($ekstensi = false)
    {
        $nama_file = str_slug('export_pengguna_'.date('Y-m-d H:i:s'));
        if($ekstensi == true){
            return $nama_file.'.xls';            
        }
        return $nama_file;
    }




    private function header_excel($sheet){
        $merge_judul = 'A1:R1';
        $arr_header_file = ['No', 'Nama', 'Email', 'No Induk', 'Alamat', 'Tgl Lahir (dd-mm-yyyy)', 'tempat_lahir',
        		'jenis kelamin', 'no hp', 'kode pos', 'no telp', 'no ktp', 'nama ibu kandung',
        		'status ikatan', 'agama', 'kota', 'status pernikahan', 'homebase'
        ];
        $cells_tampilan_header_kolom = 'A2:R2'; 
        $konten_header_file = 'Data Pengguna';
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



    private function konten_excel($sheet, $mst_user_staff_id){
		$q = $this->akses_staff->all(null, ['Akses' => $mst_user_staff_id]);
		if(count($q)>0){
			$row_start = 3;
			$row_first = 1;
			foreach($q as $list){
				$d = $list->mst_user->data_user;
		        $arr_konten_file = [
		        	$row_first, $d->nama, $d->mst_user->email, $d->no_induk, $d->alamat, date('d-m-Y', strtotime($d->tgl_lahir)),
		        	$d->tempat_lahir, $d->fk__jenis_kelamin, $d->no_hp, $d->kode_post, 
		        	$d->no_telp, $d->no_ktp, $d->nama_ibu_kandung, $d->fk__ref_status_ikatan, 
		        	$d->fk__ref_agama, $d->fk__ref_kota, $d->fk__ref_status_pernikahan,
		        	$d->fk__ref_homebase 
		        ];
		        $sheet->row($row_start, $arr_konten_file);
		        $sheet->setHeight($row_start, 20);
		        $row_start++;
		        $row_first++;
			}
		}
    }    

 

    public function handle($mst_user_staff_id)
    {
        \Excel::create($this->nama_file(), function($excel) use ($mst_user_staff_id)  {
                $excel->sheet('Sheet1', function($sheet) use ($mst_user_staff_id) {
                    $this->header_excel($sheet);
                    $this->konten_excel($sheet, $mst_user_staff_id);
                });
        })->download('xls');
	 }


 





}