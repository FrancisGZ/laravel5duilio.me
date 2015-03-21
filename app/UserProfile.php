<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	protected $table = 'user_profiles'; //opcional si el nombre de la tabla no tiene la convencionde eloquent

	public function getAgeAttribute()
	{
		return \Carbon\Carbon::parse($this->birthdate)->age;
	}

}
