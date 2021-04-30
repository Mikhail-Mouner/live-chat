<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
//        User::factory()->count(1)->create();

        // this can be done as separate statements
        foreach ( config('project.admin.roles') as $role) {
            Role::findOrCreate($role ,'admin');
        }
        // admin And moderator
        $admins = [
            [
                'name' => 'Admin',
                'email' => 'admin@chat.com',
                'role' => 'administrator',
                'password' => Hash::make('123456'), // password
            ],
            [
                'name' => 'Moderator',
                'email' => 'moderator@chat.com',
                'role' => 'moderator',
                'password' => Hash::make('123456'), // password
            ],
        ];

        foreach ($admins as $admin) {
            $exist = Admin::whereEmail($admin['email'])->first();
            if ( empty($exist) ) {
                $superAdmin = Admin::create(Arr::except($admin,'role'));
                $superAdmin->assignRole($admin['role']);
            }
        }

    }
}
