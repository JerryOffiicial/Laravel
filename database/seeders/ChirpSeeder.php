<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ChirpSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::count() < 3 
            ? collect([
                User::create([
                    'name'=> 'Alice Developer',
                    'email'=> 'alice@gmail.com',
                    'password'=> bcrypt('password'),
                ]),
                User::create([
                    'name'=> 'jason cam',
                    'email'=> 'jason@gmail.com',
                    'password'=> bcrypt('password'),
                ]),
                User::create([
                    'name'=> 'elon musk',
                    'email'=> 'elon@gmail.com',
                    'password'=> bcrypt('password'),
                ]),
            ]) 
            : User::take(3)->get();

        // sample chirps
        $chirps = [
            'Just discovered Laravel - where has this been all my life?',
            'Building something cool with Chirper today!',
            'laravel\'s Eloquent ORM is pure magic',
            'Deployed my first app with Laravel Cloud. So smooth!',
            'Friday deploys with Laravel? No Problem!',
        ];

        // create chirps for random users
        foreach ($chirps as $message) {
            $users->random()->chirps()->create([
                'message' => $message,
                'created_at' => now()->subMinutes(rand(5, 1440)),
            ]);
        }
    }
}