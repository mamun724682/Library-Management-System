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
        $user = App\User::create([

    		'name' => 'Admin',
    		'email' => 'admin@admin.com',
    		'password' => bcrypt('password'),
            'is_admin' => 1,
            'is_approved' => 1,
            'reg_as' => 1,
            'avatar' => 'avatar.jpg',
            'identity' => 'default.png'

        ]);

        App\User::create([

            'name' => 'User',
            'email' => 'user@user.com',
            'password' => bcrypt('123456'),
            'is_admin' => 0,
            'is_approved' => 1,
            'reg_as' => 1,
            'avatar' => 'avatar.jpg',
            'identity' => 'default.png'

        ]);
    }
}
