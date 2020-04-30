<?php

use Illuminate\Database\Seeder;
use App\Announcement;

class AnounceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Announcement::create([
            'name'=>'uxdiin',
            'date'=>'122131',
            'text'=>'Banyak tugas guys',
            'class_id'=>1
        ]);
    }
}
