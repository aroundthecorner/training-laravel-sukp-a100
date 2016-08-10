<?php

use Illuminate\Database\Seeder;

// include User namespace
use App\User;
use App\Post;
use App\Task;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // empty the users table
        User::truncate();

        // create 30 users
        factory(User::class, 30)->create();
    }
}
