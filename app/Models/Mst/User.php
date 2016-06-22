<?php 

namespace App\Models\Mst;

use App\Models\Mst\AksesStaff;
use App\Models\Mst\DataUser;
use App\Models\Mst\User;
use App\Models\Ref\UserLevel;
use App\MyPackages\QueryFilters\Filterable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract

{
	use Filterable;


	 use Authenticatable, Authorizable, CanResetPassword;

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
	protected $fillable = [ 'email', 'password', 'ref_user_level_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public function data_user()
	{
		return $this->hasOne(DataUser::class, 'mst_user_id');
	}


	public function level()
	{
		return $this->belongsTo(UserLevel::class, 'ref_user_level_id');
	}

	public function setPasswordAttribute($password)
	{
		$this->attributes['password'] = bcrypt($password);
	}


	/* get akses staff yg level user */
	public function akses_staff_user()
	{
		return $this->hasMany(AksesStaff::class, 'mst_user_id');	
	}


	public function staff_user()
	{
		return $this->belongsToMany(User::class, 'mst_akses_staff', 'mst_user_staff_id', 'mst_user_id');
	}


 

 	

}
