<?php namespace App\Http\Controllers;

class UsersController extends Controller {

	public function getIndex()
	{
		$result = \DB::table('users')
		->select(
			'users.*',
			'user_profiles.id as profile_id',
			'user_profiles.twitter'
			)
		//->where('first_name', '<>', 'Francis')
		//->orderBy('id','ASC')
		->orderBy(\DB::raw('RAND()')) //ordena de forma aleatoria
		//->join('user_profiles','users.id','=','user_profiles.user_id')
		->leftjoin('user_profiles','users.id','=','user_profiles.user_id')
		->get();
		//->first();

		//dd($result);

		foreach ($result as $row ) {
			
			$row->full_name = $row->first_name . ' ' . $row->last_name;

		}

		

		dd($result);

		return $result;
	}
}