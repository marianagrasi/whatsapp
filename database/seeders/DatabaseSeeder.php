<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        User::create([
            'name'=> 'Mariana',
            'email'=> 'mariana@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);

        User::create([
            'name'=> 'ana',
            'email'=> 'ana@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);

        User::create([
            'name'=> 'riana',
            'email'=> 'riana@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=> 'ariana',
            'email'=> 'ariana@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=> 'Mari',
            'email'=> 'mari@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=> 'Maria',
            'email'=> 'maria@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=> 'Marian',
            'email'=> 'marian@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);
        User::create([
            'name'=> 'arian',
            'email'=> 'arian@gmail.com',
            'password'=> bcrypt('12345678'),
        ]);


    }
}
