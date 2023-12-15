<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::create();

        \App\Models\User::create([
         'name' => 'mugil',
            'email' => 'mugilaananthan@gmail.com',
            'password' => Hash::make('12345'),
        ]);
    }
}
