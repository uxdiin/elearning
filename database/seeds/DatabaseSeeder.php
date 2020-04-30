<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(usersTableSeeder::class);
        $this->call(ClassTableSeeder::class);
        $this->call(AnnouncementTableSeeder::class);
        $this->call(ProblemTableSeeder::class);
        $this->call(ProblemNumberTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
        $this->call(AnswerNumberTableSeeder::class);
        $this->call(ClassMemberTableSeeder::class);
    }
}
