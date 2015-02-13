<?php namespace App\Helpers;

class Gravatar{

 

	public function fetch_image($email){
		$email_md5 = md5($email);
		$assetPath = '/upload/avatars';
		$uploadPath = public_path($assetPath);

			$ch = curl_init('http://www.gravatar.com/avatar/'.$email_md5.'?s=200');
			$fp = fopen($uploadPath.'/'.$email_md5.'.jpg', 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fp);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_exec($ch);
			curl_close($ch);
			fclose($fp);			
			$gambar = $email_md5.'.jpg';

		return $gambar;
	}



}