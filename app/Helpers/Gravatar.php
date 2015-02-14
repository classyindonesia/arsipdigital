<?php namespace App\Helpers;

class Gravatar{

 

	public function fetch_image($email){
		$email_md5 = md5($email);
		$assetPath = '/upload/avatars';
		$uploadPath = public_path($assetPath);

		$cek = $this->validate_gravatar($email);
		if($cek == 1){
			//jika terdaftar
			$ch = curl_init('http://www.gravatar.com/avatar/'.$email_md5.'?s=200');
			$fp = fopen($uploadPath.'/'.$email_md5.'.jpg', 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			fclose($fp);			
			$gambar = $email_md5.'.jpg';			
		}else{
			$gambar = 0;
		}



		return $gambar;
		}



		function validate_gravatar($email) {
			// Craft a potential url and test its headers
			$hash = md5(strtolower(trim($email)));
			$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
			$headers = @get_headers($uri);
			if (!preg_match("|200|", $headers[0])) {
				$has_valid_avatar = 0;
			} else {
				$has_valid_avatar = 1;
			}
			return $has_valid_avatar;
		}	



}