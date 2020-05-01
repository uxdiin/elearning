<?php

use Illuminate\Database\Seeder;
use App\Problem;

class ProblemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Problem::create([
            'title'=> 'tugas1',
            'start_time'=>'23:02:00',
            'start_date'=>'2020-04-30',
            'end_time'=>'23:02:00',
            'end_date'=>'2020-07-30',
            'class_id'=>1,

        ]);
    }
}
