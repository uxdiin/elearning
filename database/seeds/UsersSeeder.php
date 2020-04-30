<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'uxdiin',
            'email' => 'uxdiin@gmail.com',
            'role' => 'teacher',
            'password' => '12345678',
            'api_token' => '6hfzelG8XsvQQEz8Q5ncYQS95T8o3EBN7MScQtlCSR9Y6Cu5MNq8L310ievj0fNV0C6erNYjdB6CQbjb8bWgoULf',
        ]);
    }
}
