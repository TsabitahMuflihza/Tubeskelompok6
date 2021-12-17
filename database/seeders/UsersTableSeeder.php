<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
          'username' => 'Jefry USU',
          'name' => 'Jefry USU',
          'email' => 'admin@gmail.com',
          'role' => 'admin',
          'phone_number' => "081378752888",
          'address' => 'Sumtara Selatan',
          'password' => Hash::make('password'),
          'active' => "1"
        ]);
      }
}
