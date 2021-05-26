<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
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
                'name' => 'admin',
                'email' => 'admin@admin.fr',
                'password' => Hash::make('admin'), // crypté le mot de passe ,
                'elevation' => "admin"
            ],
            [
                'name' => 'kenny',
                'email' => '123@hotmail.fr',
                'password' => Hash::make('admin'), // crypté le mot de passe ,
                'elevation' => "user"
            ]
        ]);
    }
}
