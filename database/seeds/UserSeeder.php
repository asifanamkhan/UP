<?php

use Illuminate\Database\Seeder;
use App\Role;
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
        $user1 =User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('abcd1234'),
            'remember_token' => str_random(10),
        ]);
        $role1 = Role::find(1);
        $user1->attachRole($role1);
    }
}
