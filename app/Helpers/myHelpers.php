<?php 


if (! function_exists('is_image')) {

	function is_image($path)
	{
	    $a = getimagesize($path);
	    $image_type = $a[2];
	     
	    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	    {
	        return true;
	    }
	    return false;
	}
}

 
 
if (! function_exists('setup_variable')) {

	/**
	 * berfungsi sebagai pengisian value secara global
	 * @param  [type]  $variable   [nama variable yg ada dlm db]
	 * @param  boolean $empty_info [jika diisi false, maka pesan error saat variable tidak ditemukan akan dikosongkan]
	 * @return [type]              [string]
	 */
    function setup_variable($variable, $empty_info = true)
    {
    	$app = app('Repo\Contracts\SetupVariableInterface');
    	$obj = $app->getByVariable($variable);
    	if(count($obj)>0){
	        return $obj->value;    		
    	}
    	if($empty_info = true){
	    	return '-error! variable tidak ditemukan-';
    	}
    	return '';
    }
}
