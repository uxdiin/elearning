<?php

use Illuminate\Database\Seeder;
use App\Class_Member;

class ClassMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Class_Member::create([
            'class_id'=>1,
            'user_id'=>101,
        ]);
    }
}
