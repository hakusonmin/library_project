<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('halls')->insert([
            [
                'id' => 1,
                'name' => 'A図書館',
            ],
            [
                'id' => 2,
                'name' => 'B図書館',
            ],
            [
                'id' => 3,
                'name' => 'C図書館',
            ],
            [
                'id' => 4,
                'name' => 'D図書館',
            ],
            [
                'id' => 5,
                'name' => 'E図書館',
            ],
            [
                'id' => 6,
                'name' => 'F図書館',
            ]
        ]);
    }
}
