<?php namespace App;

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
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['first_name','last_name', 'email', 'password','type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];



	public static function filterAndPaginate ($name, $type)
	{
		return User::name($name)
			->type($type)
			->orderBy('id','DESC')
			->paginate();
	}


	public function profile()
	{
		return $this->hasOne('App\UserProfile');
	}



	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	public function setPasswordAttribute($value)
	{
		if(!empty($value))
		{
			$this->attributes['password'] = \Hash::make($value);	
		}
		
	}

	public function scopeName ($query, $name)
	{

			//dd("Scope: ". $name);
		if (trim($name) != "")
		{
			$query->where(\DB::raw("CONCAT(first_name, ' ' , last_name)"), "LIKE", "%$name%");
		}
	}

	public function scopeType ($query, $type)
	{
		$types = config('options.types');

		if ($type != "" && isset($types[$type]))
		{
			$query->where('type',$type); //Si se necesita un operador se pasa  where('type','<>',$type), trae el valor = por defecto 
		}
	}

}
