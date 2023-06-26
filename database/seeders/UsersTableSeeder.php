<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        User::create([
            'name' => 'Arturo',
            'email' => 'arturom7@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('arturo1234'), // password            
            'cedula' => '18511205',
            'address' => 'Menca de Leoni Guarenas',
            'phone' => '02123615536',
            'role' => 'admin',
        ]);

        User::factory()
        ->count(50)
        ->create();
    }
}
