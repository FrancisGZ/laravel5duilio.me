<?php namespace App\Http\Controllers;


use App\User;

class UsersController extends Controller {


	public function getOrm()
	{
		//$user = User::first();
		$users = User::select('id','first_name')
				->with('profile') //profile metodo que se definio en el objeto/clase user
				->where('first_name','<>','Francis')
				->orderBy('first_name','ASC')
				->get();


		///dd($result->getFullNameAttribute());
		//dd($user->profile->age);
		dd($users->toArray());
	}


	public function getIndex()
	{
		$result = \DB::table('users')
		->select(
			'users.*',
			'user_profiles.id as profile_id',
			'user_profiles.twitter',
			'user_profiles.birthdate'
			)
		//->where('first_name', '<>', 'Francis')
		->orderBy('id','ASC')
		//->orderBy(\DB::raw('RAND()')) //ordena de forma aleatoria
		//->join('user_profiles','users.id','=','user_profiles.user_id')
		->leftjoin('user_profiles','users.id','=','user_profiles.user_id')
		->get();
		//->first();

		//dd($result);

		foreach ($result as $row ) {
			
			$row->full_name = $row->first_name . ' ' . $row->last_name;

			$row->age = \Carbon\Carbon::parse($row->birthdate)->age;

		}

		

		dd($result);

		return $result;
	}
}