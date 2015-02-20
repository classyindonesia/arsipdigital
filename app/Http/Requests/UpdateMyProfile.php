<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateMyProfile extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'nama'						=> 'required',
			'alamat'					=> 'required',
			'tgl_lahir'					=> 'required|date',
			'no_hp'						=> 'required',
			'tempat_lahir'				=> 'required',
			'ref_agama_id'				=> 'required',
			'ref_homebase_id'			=> 'required',
			'ref_status_pernikahan_id'	=> 'required'
		];
	}

}
