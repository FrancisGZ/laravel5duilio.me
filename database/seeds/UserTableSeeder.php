<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	
	public function run()
	{
		\DB::table('users')->insert(array (
				'name' 		=> 'Francis',
				'email' 	=> 'fagz@gmail.com',
				'password' 	=> \Hash::make('secret')

			));
	}

}
