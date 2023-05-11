<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $role_user = \App\Models\Role::where('name', 'user')->first();
        if(!$role_user) {
            $role_user = new \App\Models\Role();
            $role_user->name = 'user';
            $role_user->save();
        }

        $role_admin = \App\Models\Role::where('name', 'admin')->first();
        if(!$role_admin) {
            $role_admin = new \App\Models\Role();
            $role_admin->name = 'admin';
            $role_admin->save();
            }

         \App\Models\User::factory(10)->create(['role_id'=>$role_user->id]);
        \App\Models\User::factory(2)->create(['role_id'=>$role_admin->id]);

        // Create a constant user account
        $user = new User([
            'name' => 'John Doe',
            'email' => 'user1@user.com',
            'password' => bcrypt('password'),
            'role_id' => $role_user->id,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $user->save();

        // Create a constant admin account
        $admin = new User([
            'name' => 'Jane Doe',
            'email' => 'admin1@admin.com',
            'password' => bcrypt('password'),
            'role_id' => $role_admin->id,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
        $admin->save();
    }
}
