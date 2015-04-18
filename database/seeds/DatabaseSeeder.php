<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		 //$this->call('AdminTableSeeder'); //lo comente para que no hicera la migracion del administrador y  provocara un error
		 $this->call('UserTableSeeder');
	}

}
