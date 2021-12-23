<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
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
        $admin = Role::create([
            'name' => 'admin',
            'display_name' => 'User Administrator'
        ]);

        $pengguna = Role::create([
            'name' => 'pengguna',
            'display_name' => 'User Biasa'
        ]);

        $user = new User();
        $user->name = 'Dina Amelia';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('12345678');
        $user->save();

        $pengunjung = new User();
        $pengunjung->name = 'Pengunjung';
        $pengunjung->email = 'pengunjung@gmail.com';
        $pengunjung->password = Hash::make('12345678');
        $pengunjung->save();

        $user->attachRole($admin);
        $pengunjung->attachRole($pengguna);

        // $user = new User();
        // $user->name = 'Fitria Amelia';
        // $user->email = 'member@gmail.com';
        // $user->password = Hash::make('01234567');
        // $user->save();

        // $user = new User();
        // $user->name = 'Kesyza Andriana H';
        // $user->email = 'kesyza@gmail.com';
        // $user->password = Hash::make('23456789');
        // $user->save();

        // $user = new User();
        // $user->name = 'Sila Ramadina';
        // $user->email = 'sila@gmail.com';
        // $user->password = Hash::make('34567890');
        // $user->save();

        // $user = new User();
        // $user->name = 'Rifa Fauziah';
        // $user->email = 'rifa@gmail.com';
        // $user->password = Hash::make('45678901');
        // $user->save();

        // $user = new User();
        // $user->name = 'Erin Rafani';
        // $user->email = 'erin@gmail.com';
        // $user->password = Hash::make('56789012');
        // $user->save();

    }
}
