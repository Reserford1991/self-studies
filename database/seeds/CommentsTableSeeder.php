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
        $count = 0;
        for ($i = 1; $i < 6; $i++) {
//
//            DB::table('comments')->insert([
//                'id' => $count,
//                'post_id' => $i,
//                'user_id' => 0,
//                'body' => 'Comment '.$i,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);
//            DB::table('comments')->insert([
//                'id' => $count,
//                'post_id' => $i,
//                'user_id' => 0,
//                'body' => 'Comment '.$i,
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);

            for($j = 1; $j < 3; $j++){
            DB::table('comments')->insert([
                'id' => $count+$j,
                'post_id' => $i,
                'user_id' => 0,
                'body' => 'Comment '.$i,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
                $count++;
            }

        }
    }
}
