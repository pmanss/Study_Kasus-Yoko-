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
       DB::table('users')->insert(array(
        [
         'name' => 'Firman\' Yoko', 
         'email' => 'user@mail.com',
         'password' => bcrypt('rahasia'),
         'foto' => 'user.png',
         'level' => 1
        ],
        [
         'name' => 'Erli Nur', 
         'email' => 'erli@nur.com',
         'password' => bcrypt('rahasia'),
         'foto' => 'user.png',
         'level' => 2
        ]
      ));

    }
}
