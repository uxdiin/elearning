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
            'name'=> 'Aqidah',
            'code'=> '1231',
            'description'=> 'Kelas Aqidah Bukan Filsafat',
            'teacher_id'=>11
        ]);
    }
}
