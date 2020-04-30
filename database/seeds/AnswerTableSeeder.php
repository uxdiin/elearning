<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::create([
            'problem_id'=>1,
            'user_id'=>101,
            'nilai'=>100
        ]);    
    }
}
