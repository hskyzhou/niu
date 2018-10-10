<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;
use App\Repositories\Models\Menu;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::insert([
            ['name'=>'管理员管理', 'route'=>'admin.user.index', 'permission'=>'admin.user.index'],
        ]);
        
        $role = Role::create([
            'name' => 'admin',
            'display_name' => '管理员',
            'description' => '管理员',
        ]);

        $permissions = [
            ['name' => 'admin.user.index', 'display_name' => '用户管理'],
        ];

        foreach ($permissions as $permission) {
            $permission = Permission::create($permission);

            $role->attachPermission($permission);
        }

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'mobile' => '13112345678',
        ]);

        $user->attachRole($role);
    }
}
