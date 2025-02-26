<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      [
        'id' => 1,
        'name' => 'fuga',
        'email' => 'fuga@gmail.com',
        'password' => Hash::make('fugafuga'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 2,
        'name' => 'fuga2',
        'email' => 'fuga2@gmail.com',
        'password' => Hash::make('fugafuga2'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 3,
        'name' => 'fuga3',
        'email' => 'fuga3@gmail.com',
        'password' => Hash::make('fugafuga3'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 4,
        'name' => 'fuga4',
        'email' => 'fuga4@gmail.com',
        'password' => Hash::make('fugafuga4'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 5,
        'name' => 'fuga5',
        'email' => 'fuga5@gmail.com',
        'password' => Hash::make('fugafuga5'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 6,
        'name' => 'fuga6',
        'email' => 'fuga6@gmail.com',
        'password' => Hash::make('fugafuga6'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 7,
        'name' => 'fuga7',
        'email' => 'fuga7@gmail.com',
        'password' => Hash::make('fugafuga7'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 8,
        'name' => 'fuga8',
        'email' => 'fuga8@gmail.com',
        'password' => Hash::make('fugafuga8'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 9,
        'name' => 'fuga9',
        'email' => 'fuga9@gmail.com',
        'password' => Hash::make('fugafuga9'),
        'created_at' => '2021/01/01 11:11:11'
      ],
      [
        'id' => 10,
        'name' => 'fuga10',
        'email' => 'fuga10@gmail.com',
        'password' => Hash::make('fugafuga10'),
        'created_at' => '2021/01/01 11:11:11'
      ],
    ]);
  }
}
