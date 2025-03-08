<?php

namespace Database\Seeders;

use App\Models\Configuration\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Uid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'full_name' => 'Renato Falzoni',
            'user_name' => 'rfalzoni13',
            'email' => 'renato.lopes.falzoni@gmail.com',
            'phone_number' => '(11) 97699-6744',
            'password' => Hash::make('DevFalPal013')
        ]);
    }
}
