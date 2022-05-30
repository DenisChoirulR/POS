<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		App\Permission::create([
		       'name' => 'master data' // id 1
		]);
		App\Permission::create([
		       'name' => 'cashier' // id 2
		]);
		App\Permission::create([
		       'name' => 'invoice' // id 3
		]);

		$admin = App\Role::where('name', 'Admin')->first();
		$admin->permissions()->attach([1,2,3]);

		$staff = App\Role::where('name', 'Cashier')->first();
		$staff->permissions()->attach([2,3]);
    }
}
