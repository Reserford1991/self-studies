<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 6; $i++) {
            DB::table('comments')->insert([
              'id' => $i,
              'post_id' => $i,
              'user_id' => 1,
              'body' => 'Test comment '.$i,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
        }
    }
}
