<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\User::create([
		       'name' => 'Admin',
		       'email' => 'admin',
		       'password' => bcrypt('12345678'),
		       'role_id' => 1
		]);

		App\User::create([
		       'name' => 'Cashier 1',
		       'email' => 'cashier1',
		       'password' => bcrypt('12345678'),
		       'role_id' => 2
		]);

		App\User::create([
		       'name' => 'Cashier 1',
		       'email' => 'cashier2',
		       'password' => bcrypt('12345678'),
		       'role_id' => 2
		]);     
    }
}
