<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('floors')->insert([
            [
                'id' => 1,
                'hall_id' => '1',
                'name' => '1階',
            ],
            [
                'id' => 2,
                'hall_id' => '1',
                'name' => '2階',
            ],
            [
                'id' => 3,
                'hall_id' => '1',
                'name' => '3階',
            ],
            [
                'id' => 4,
                'hall_id' => '1',
                'name' => '4階',
            ],
            [
                'id' => 5,
                'hall_id' => '2',
                'name' => '1階',
            ],
            [
                'id' => 6,
                'hall_id' => '2',
                'name' => '2階',
            ],
            [
                'id' => 7,
                'hall_id' => '2',
                'name' => '3階',
            ],
            [
                'id' => 8,
                'hall_id' => '2',
                'name' => '4階',
            ],
        ]);
    }
}
