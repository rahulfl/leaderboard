<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test',
            'email' => 'test@test.com',
        ]);
        
        Level::factory(10)->create();
        Player::factory(10)->create();
        $this->call([
            GameSeeder::class,
        ]);
    }
}
