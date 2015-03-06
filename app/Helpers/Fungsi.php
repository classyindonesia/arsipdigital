<?php namespace App\Helpers;
class Fungsi {


public static function restyle_text($input){
    $suffixes = array('', 'k', 'm', 'g', 't');
    $suffixIndex = 0;

    while(abs($input) >= 1000 && $suffixIndex < sizeof($suffixes))
    {
        $suffixIndex++;
        $input /= 1000;
    }

    return (
        $input > 0
            // precision of 3 decimal places
            ? floor($input * 1000) / 1000
            : ceil($input * 1000) / 1000
        )
        . $suffixes[$suffixIndex];
}


public static function size($bytes){
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}




public static function angka_romawi($integer, $upcase = true){ 
    $table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
    $return = ''; 
    while($integer > 0){ 
        foreach($table as $rom=>$arb){ 
            if($integer >= $arb){ 
                $integer -= $arb; 
                $return .= $rom; 
                break; 
            } 
        } 
    } 
    return $return; 
} 


  public static function limit_karakter($str){
    if(strlen($str) >=35 ){
      $pecah_str = explode(".", $str);
      $ekstensi =  $pecah_str[count($pecah_str) - 1];
      $output = substr($str, 0, 35).'.'.$ekstensi;
    }else{
      $output = $str;
    }
    return $output;
  }


public static function angka_to_huruf($angka){
  $angka = str_replace("1"," Satu",$angka);
  $angka = str_replace("2"," Dua",$angka);
  $angka = str_replace("3"," Tiga",$angka);
  $angka = str_replace("4"," Empat",$angka);
  $angka = str_replace("5"," Lima",$angka);
  $angka = str_replace("6"," Enam",$angka);
  $angka = str_replace("7"," Tujuh",$angka);
  $angka = str_replace("8"," Delapan",$angka);
  $angka = str_replace("9"," Sembilan",$angka);
  $angka = str_replace("10"," Sepuluh",$angka);
  $angka = str_replace("11"," Sebelas",$angka);
  $angka = str_replace("12"," Dua belas",$angka);
  $angka = str_replace("13"," Tiga belas",$angka);
  $angka = str_replace("0"," Nol",$angka);
  $angka = str_replace("."," koma",$angka);
  return $angka;
}

public static function check_url($url){
  $array = get_headers($url);
  $string = $array[0];
  if(strpos($string,"200"))
    {
      $data = 1; //ada
    }
    else
    {
      $data = 0; //tidak ada /404
    }  
    return $data;
}



    public static function rupiah($nilaiUang){
  $nilaiRupiah  = "";
  $jumlahAngka  = strlen($nilaiUang);
  while($jumlahAngka > 3){
    $nilaiRupiah = "." . substr($nilaiUang,-3) . $nilaiRupiah;
    $sisaNilai = strlen($nilaiUang) - 3;
    $nilaiUang = substr($nilaiUang,0,$sisaNilai);
    $jumlahAngka = strlen($nilaiUang);
  }

  $nilaiRupiah = "Rp " . $nilaiUang . $nilaiRupiah . ",-";
  return $nilaiRupiah;
}


 public static function UserOnline(){
  if (Auth::check()){
 
      $agent = new Browser();
      $browser = $agent->getBrowser(); //$this->input->user_agent();
        $tm = time();
        $now = $tm - 200;
        $ip= Request::getClientIp(); //$this->input->ip_address();

        $username = Auth::user()->username;





        $clear = Useronline::where('timevisit', '<', $now);
        $clear->delete(); //hapus data lama

        $useronline = Useronline::where('username', '=', $username)->count();
        if($useronline > 0){
          $uol_update = Useronline::where('username', '=', $username)->first();
          $uol_update->timevisit = $tm;
          $uol_update->save();
        }else{
          $uol_insert = new Useronline;
          $uol_insert->ip           = $ip;
          $uol_insert->username     = $username;
          $uol_insert->user_agent   = $browser;
          $uol_insert->timevisit    = $tm;
          $uol_insert->save();
        }
        $jml = Useronline::count();
        return $jml;
  }else{
    return 0;
  }
  }
  
public static function huruf($angka)
{
$angka = str_replace("1"," Satu",$angka);
$angka = str_replace("2"," Dua",$angka);
$angka = str_replace("3"," Tiga",$angka);
$angka = str_replace("4"," Empat",$angka);
$angka = str_replace("5"," Lima",$angka);
$angka = str_replace("6"," Enam",$angka);
$angka = str_replace("7"," Tujuh",$angka);
$angka = str_replace("8"," Delapan",$angka);
$angka = str_replace("9"," Sembilan",$angka);
$angka = str_replace("0"," Nol",$angka);
$angka = str_replace("."," koma",$angka);
return $angka;
}

public static function terbilang($bilangan)
{
    if($bilangan=='' || $bilangan==0)
            return "nol";
      $angka = array('0','0','0','0','0','0','0','0','0','0',
                     '0','0','0','0','0','0');
      $kata = array('','satu','dua','tiga','empat','lima',
                    'enam','tujuh','delapan','sembilan');
      $tingkat = array('','ribu','juta','milyar','triliun');

      $panjang_bilangan = strlen($bilangan);

      /* pengujian panjang bilangan */
      if ($panjang_bilangan > 15) {
        $kalimat = "Diluar Batas";
        return $kalimat;
      }

      /* mengambil angka-angka yang ada dalam bilangan,
         dimasukkan ke dalam array */
      for ($i = 1; $i <= $panjang_bilangan; $i++) {
        $angka[$i] = substr($bilangan,-($i),1);
      }

      $i = 1;
      $j = 0;
      $kalimat = "";


      /* mulai proses iterasi terhadap array angka */
      while ($i <= $panjang_bilangan) {

        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";

        /* untuk ratusan */
        if ($angka[$i+2] != "0") {
          if ($angka[$i+2] == "1") {
            $kata1 = "seratus";
          } else {
            $kata1 = $kata[$angka[$i+2]] . " ratus";
          }
        }

        /* untuk puluhan atau belasan */
        if ($angka[$i+1] != "0") {
          if ($angka[$i+1] == "1") {
            if ($angka[$i] == "0") {
              $kata2 = "sepuluh";
            } elseif ($angka[$i] == "1") {
              $kata2 = "sebelas";
            } else {
              $kata2 = $kata[$angka[$i]] . " belas";
            }
          } else {
            $kata2 = $kata[$angka[$i+1]] . " puluh";
          }
        }

        /* untuk satuan */
        if ($angka[$i] != "0") {
          if ($angka[$i+1] != "1") {
            $kata3 = $kata[$angka[$i]];
          }
        }

        /* pengujian angka apakah tidak nol semua,
           lalu ditambahkan tingkat */
        if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
            ($angka[$i+2] != "0")) {
          $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }

        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
           ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;

      }

      /* mengganti satu ribu jadi seribu jika diperlukan */
      if (($angka[5] == "0") AND ($angka[6] == "0")) {
        $kalimat = str_replace("satu ribu","seribu",$kalimat);
      }

      return trim($kalimat);

}




  public static function generate_npm($kode_prodi, $kode_thn){

      $prodi_thn = $kode_thn.'.'.$kode_prodi;

     //cari npm dgn urutan terbesar
      $urut_akhir = Mahasiswa::where('npm', 'like', $prodi_thn.'%')->max('npm');
      $ob = explode('.', $urut_akhir); //jadikan array npm 
      $jml = count($ob) -1; //jml array dikurangi 1 utk menyesuaikan dgn offset yg ada dlm array
      $urut_akhir = $ob[$jml];//ngambil value dr array yg offset terakhir
      $urut_akhir = $urut_akhir +1;
        if($urut_akhir < 10) $urut_akhir = '0'.$urut_akhir;
        if($urut_akhir < 100) $urut_akhir = '0'.$urut_akhir;
        if($urut_akhir < 1000) $urut_akhir = '0'.$urut_akhir;
      $npm = $prodi_thn.'.'.$urut_akhir;

    return $npm;
  }

 


  public static function filter($val = null){
    // $str = addslashes();
    $str = str_replace(['\r', '\n'], '',  $val);
    $o = explode(" ", $str);
    $jml = count($o) -1;
      for($i=0;$i<=$jml;$i++){
        $o[$i] = trim($o[$i]);
      }
    $str = implode(" ", $o);
    return HTML::entities($str);
  }


public static function http_file_exists($url, $followRedirects = true)
{
   $url_parsed = parse_url($url);
   extract($url_parsed);
   if (!@$scheme) $url_parsed = parse_url('http://'.$url);
   extract($url_parsed);
   if(!@$port) $port = 80;
   if(!@$path) $path = '/';
   if(@$query) $path .= '?'.$query;
   $out = "HEAD $path HTTP/1.0\r\n";
   $out .= "Host: $host\r\n";
   $out .= "Connection: Close\r\n\r\n";
   if(!$fp = @fsockopen($host, $port, $es, $en, 5)){
       return false;
   }
   fwrite($fp, $out);
   while (!feof($fp)) {
       $s = fgets($fp, 128);
       if(($followRedirects) && (preg_match('/^Location:/i', $s) != false)){
           fclose($fp);
           return http_file_exists(trim(preg_replace("/Location:/i", "", $s)));
       }
       if(preg_match('/^HTTP(.*?)200/i', $s)){
           fclose($fp);
           return true;
       }
   }
   fclose($fp);
   return false;
}





  public static function setup_variable($var){

    $val = Setup_Variable::where('variable', '=', $var)
          ->take(1)
          ->get();

    foreach($val as $list){
      $value = $list->value;
    }
    return $value;

  }



    
    
   public static function get_id($str_id){
         $str = explode("-", $str_id);
       $id= $str[count($str) - 1];
        return $id;
    }
    
    
    
    
    public static function random_element($array){
            if ( ! is_array($array))
            {
               return $array;
            }
            
            return $array[array_rand($array)];
	}
        
        
        public static function get_dropdown($model, $nama_dropdown = NULL){
            $data = array('' => '-pilih '.$nama_dropdown."-");
            foreach($model as $list){
                if(!empty($list->nama)){
                $data[$list->id] = $list->nama;
                }else{
                 $data[$list->id] = $list->judul;   
                }
            }
            
            return $data;
        }






        public static function bg_header(){
            $array = array();
            foreach(Bgheader::all() as $list){
                $array[]=$list->nama;
            }
            return $array[array_rand($array)];
	}
        
        
        public static function check_var_nav($var){
            
            if(isset($var)){
                $data = 'class="active"';
            }else{
                $data= NULL;
            }
            return $data;
        }
        
        
        
        
    public static function bulan2($rrr)
	{
	if($rrr=='1' || $rrr=='01'){$ttt='Januari';}
	if($rrr=='2' || $rrr=='02'){$ttt='Februari';}
	if($rrr=='3' || $rrr=='03'){$ttt='Maret';}
	if($rrr=='4' || $rrr=='04'){$ttt='April';}
	if($rrr=='5' || $rrr=='05'){$ttt='Mei';}
	if($rrr=='6' || $rrr=='06'){$ttt='Juni';}
	if($rrr=='7' || $rrr=='07'){$ttt='Juli';}
	if($rrr=='8' || $rrr=='08'){$ttt='Agustus';}
	if($rrr=='9' || $rrr=='09'){$ttt='September';}
	if($rrr=='10'){$ttt='Oktober';}
	if($rrr=='11'){$ttt='November';}
	if($rrr=='12'){$ttt='Desember';}
	return $ttt;
	}        
        
        
    public static function date_to_tgl($in)
	{
	$tgl = substr($in,8,2);
	$bln = substr($in,5,2);
	$thn = substr($in,0,4);
	if(checkdate($bln,$tgl,$thn))
	{
	   $out=substr($in,8,2)." ".  Fungsi::bulan2(substr($in,5,2))." ".substr($in,0,4);
	}
	else
	{
	   $out = "<span class='error'>N/A</span>";
	}
	return $out;
	}        
       







public static function alphaID($in, $to_num = false, $pad_up = false, $passKey = null)
{
  $index = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  if ($passKey !== null) {
      // Although this function's purpose is to just make the
      // ID short - and not so much secure,
      // with this patch by Simon Franz (http://blog.snaky.org/)
      // you can optionally supply a password to make it harder
      // to calculate the corresponding numeric ID

      for ($n = 0; $n<strlen($index); $n++) {
          $i[] = substr( $index,$n ,1);
      }

      $passhash = hash('sha256',$passKey);
      $passhash = (strlen($passhash) < strlen($index))
          ? hash('sha512',$passKey)
          : $passhash;

      for ($n=0; $n < strlen($index); $n++) {
          $p[] =  substr($passhash, $n ,1);
      }

      array_multisort($p,  SORT_DESC, $i);
      $index = implode($i);
  }

  $base  = strlen($index);

  if ($to_num) {
      // Digital number  <<--  alphabet letter code
      $in  = strrev($in);
      $out = 0;
      $len = strlen($in) - 1;
      for ($t = 0; $t <= $len; $t++) {
          $bcpow = bcpow($base, $len - $t);
          $out   = $out + strpos($index, substr($in, $t, 1)) * $bcpow;
      }

      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $out -= pow($base, $pad_up);
          }
      }
      $out = sprintf('%F', $out);
      $out = substr($out, 0, strpos($out, '.'));
  } else {
      // Digital number  -->>  alphabet letter code
      if (is_numeric($pad_up)) {
          $pad_up--;
          if ($pad_up > 0) {
              $in += pow($base, $pad_up);
          }
      }

      $out = "";
      for ($t = floor(log($in, $base)); $t >= 0; $t--) {
          $bcp = bcpow($base, $t);
          $a   = floor($in / $bcp) % $base;
          $out = $out . substr($index, $a, 1);
          $in  = $in - ($a * $bcp);
      }
      $out = strrev($out); // reverse
  }

  return $out;
}




 
        
        
}