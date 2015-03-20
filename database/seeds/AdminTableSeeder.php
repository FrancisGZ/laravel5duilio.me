<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdminTableSeeder extends Seeder {

	
	public function run()
	{
		\DB::table('users')->insert(array (
				'first_name'=> 'Francis',
				'last_name' => 'Gonzalez',
				'email' 	=> 'francis_gz@hotmail.com',
				'password' 	=> \Hash::make('secret'),
				'type'		=>	'admin'
			));

		
	}

}
