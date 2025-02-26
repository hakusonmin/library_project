<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $this->call([
      AdminSeeder::class,
      UserSeeder::class,
      HallSeeder::class,
      FloorSeeder::class,
      SheetSeeder::class,
      RegistrationSeeder::class,
    ]);
    }
}
