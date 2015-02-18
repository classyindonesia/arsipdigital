<?php namespace App\Models\Mst;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
 
class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'mst_users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'ref_user_level_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function data_user(){
		return $this->hasOne('App\Models\Mst\DataUser', 'mst_user_id');
	}


	public function level(){
		return $this->belongsTo('App\Models\Ref\UserLevel', 'ref_user_level_id');
	}

	public function setPasswordAttribute($password){
		$this->attributes['password'] = bcrypt($password);
	}


	/* get akses staff yg level user */
	public function akses_staff_user(){
		return $this->hasMany('\App\Models\Mst\AksesStaff', 'mst_user_id');	
	}


	public function staff_user(){
		return $this->belongsToMany('\App\Models\Mst\User', 'mst_akses_staff', 'mst_user_staff_id', 'mst_user_id');
	}


 

 	

}
