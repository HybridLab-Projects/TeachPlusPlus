<?php namespace Teachplusplus\Teachers\Updates;

use Seeder;
use RainLab\User\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'user',
            'surname' => 'user',
            'username' => 'user',
            'email' => 'user@user.sk',
            'password' => 'Password1234',
            'password_confirmation' => 'Password1234',
            'agree' => true,
            'is_activated' => true
        ]);
        $user = User::create([
            'name' => 'user2',
            'surname' => 'user2',
            'username' => 'user2',
            'email' => 'user2@user.sk',
            'password' => 'Password1234',
            'password_confirmation' => 'Password1234',
            'agree' => true,
            'is_activated' => true
        ]);
    }
}