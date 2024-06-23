<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Team;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::create(['name' => 'Team Aces', 'path' => '1-aces.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Blazers', 'path' => '2-blazers.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Champions', 'path' => '3-champions.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Dynamos', 'path' => '4-dynamos.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Eagles', 'path' => '5-eagles.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Falcons', 'path' => '6-falcons.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Guardians', 'path' => '7-guardians.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Hurricanes', 'path' => '8-hurricanes.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Invincibles', 'path' => '9-invincibles.jpg', 'wins' => 0]);
        Team::create(['name' => 'Team Jaguars', 'path' => '10-jaguars.jpg', 'wins' => 0]);
    }
}
