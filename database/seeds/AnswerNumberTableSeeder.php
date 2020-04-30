<?php

use Illuminate\Database\Seeder;
use App\Answer_Number;

class AnswerNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer_Number::create([
            'text'=>'hai',
            'answer_id'=>1,
        ]);
    }
}
