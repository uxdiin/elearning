<?php

use Illuminate\Database\Seeder;
use App\Problem_Number;
class ProblemNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Problem_Number::create([
            'number'=>1,
            'pertanyaan'=>'hai',
            'jawaban'=>'halo',
            'problem_id'=>1
        ]);
    }
}
