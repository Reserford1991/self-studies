<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'id' => 1,
          'name' => 'John Doe',
          'email' => 'john@example.com',
          'password' => bcrypt('password'),
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        ]);
    }
}
