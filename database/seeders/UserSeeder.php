<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'Bruno Aguirre',
            'email'=> 'admin@gmail.com',
            'password'=>('123456789')


        ])->assignRole('Admin');

        User::create([

            'name' => 'Carlos Aguirre',
            'email'=> 'bagui@gmail.com',
            'password'=>('123456789')

        ])->assignRole('DTI');

        User::create([

            'name' => 'Jean Aguirre',
            'email'=> 'jeanllanos@gmail.com',
            'password'=>('123456789')

        ])->assignRole('Asuntos Internos');

        User::create([

            'name' => 'Luis Aguirre',
            'email'=> 'luisaguirre@gmail.com',
            'password'=>('123456789')

        ])->assignRole('SSOMA');
    }
}
