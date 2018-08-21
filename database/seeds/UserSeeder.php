<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'admin',
            'display_name' => '管理员',
            'description' => '管理员',
        ]);

        $user = User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('123456'),
        	'mobile' => '13112345678',
        ]);

        $user->attachRole($role);
    }
}
