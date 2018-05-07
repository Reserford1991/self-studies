<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        DB::table('tasks')->insert([
//          'body' => 'task 1',
//          'created_at' => Carbon::now(),
//          'updated_at' => Carbon::now(),
//        ]);
//
        for ($i = 1; $i < 6; $i++) {
            DB::table('tasks')->insert([
              'id' => $i,
              'body' => 'task '.$i,
              'completed' => false,
              'created_at' => Carbon::now(),
              'updated_at' => Carbon::now(),
            ]);
        }
    }
}
