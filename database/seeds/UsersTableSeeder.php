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
            'name' => 'admin',
            'password' => bcrypt('password'),
            'email' => 'admin@forum.test',
            'avatar' => asset('avatars/avatar.png'),
            'is_admin' => 1
        ]);
    }
}
