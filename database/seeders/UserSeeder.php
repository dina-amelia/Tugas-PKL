<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use  Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Dina Amelia';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $user = new User();
        $user->name = 'Fitria Amelia';
        $user->email = 'member@gmail.com';
        $user->password = Hash::make('01234567');
        $user->save();

        $user = new User();
        $user->name = 'Kesyza Andriana H';
        $user->email = 'kesyza@gmail.com';
        $user->password = Hash::make('23456789');
        $user->save();

        $user = new User();
        $user->name = 'Sila Ramadina';
        $user->email = 'sila@gmail.com';
        $user->password = Hash::make('34567890');
        $user->save();

        $user = new User();
        $user->name = 'Rifa Fauziah';
        $user->email = 'rifa@gmail.com';
        $user->password = Hash::make('45678901');
        $user->save();

        $user = new User();
        $user->name = 'Erin Rafani';
        $user->email = 'erin@gmail.com';
        $user->password = Hash::make('56789012');
        $user->save();


    }
}
