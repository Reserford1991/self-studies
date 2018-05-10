<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('posts')->insert([
              'id' => $i,
              'title' => 'Title '.$i,
              'body' => 'Text '.$i,
              'user_id' => 1,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
        }
    }
}
