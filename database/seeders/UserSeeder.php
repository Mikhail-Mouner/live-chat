<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\PermissionRegistrar;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrcreate([
            'name'       => config('project.seed.test_name') ,
            'email'      => config('project.seed.test_email') ,
            'password'   => Hash::make(config('project.seed.test_password')) ,
        ]);
    }
}
