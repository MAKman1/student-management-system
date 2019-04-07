<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersLoginTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            [
                'name' => 'Makman',
                'email' => 'admin',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'admin',
            ],
            [
                'name' => 'Makman',
                'email' => 'administration',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'administration',
            ],
            [
                'name' => 'Makman',
                'email' => 'accountant',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'accountant',
            ],
            [
                'name' => 'Makman',
                'email' => 'teacher',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'teacher',
            ],
            [
                'name' => 'Makman',
                'email' => 'student',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'student',
            ],
            [
                'name' => 'Makman',
                'email' => 'parent',
                'password' => Hash::make('makman'),
                'remember_token' => str_random(10),
                'role' => 'parent',
            ]

        ]);
    }
}
