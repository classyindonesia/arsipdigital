<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Mst\Arsip;
use Auth;
use Illuminate\Http\Request as Req;
class UpdateArsip extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(Req $request)
	{
        if ( ! Auth::check() )
        {
            return false;
        }
        if(!Auth::user()->ref_user_level_id == 1){
	        $thingBeingEdited = Arsip::find($request->input('id'));
	        if ( ! $thingBeingEdited || $thingBeingEdited->mst_user_id != Auth::id() ) {
	            return false;
	        }
        }



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
			'nama'				=> 'required',
			'mst_folder_id'		=> 'required',
		];
	}

}
