<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
               'name'=>'Aman Prabhakar',
               'email'=>'amanparbhakar74@gmail.com',
               'password'=> bcrypt('Aman@2021'),
            ],
            [
                'name'=>'Amrik Cheema',
                'email'=>'asspcheema@gmail.com',
                'password'=> bcrypt('Amrik@2021'),
             ],
            [
               'name'=>'Dhruv Singh',
               'email'=>'singh1999dhruv@gmail.com',
               'password'=> bcrypt('Dhruv@2021'),
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
