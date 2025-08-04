<?php

namespace Database\Seeders;

use App\Models\{Event, User};
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'name'          => 'My name',
            'email'         => 'email@email.com',
            'password'      => Hash::make('password'),
            'date_of_birth' => '1990-01-01',
            'role'          => 'admin',
        ]);

        Event::factory(20)->create();
    }
}
