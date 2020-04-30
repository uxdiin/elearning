<?php

use Illuminate\Database\Seeder;
use App\CClass;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CClass::create([
            'id'=>1,
            'name'=> 'Algoritma',
            'code'=> '1231',
            'description'=> 'KElas Algortima Pemrograman',
            'teacher_id'=>11
        ]);
    }
}
