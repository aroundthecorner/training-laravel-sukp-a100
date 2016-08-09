<?php

use Illuminate\Database\Seeder;

use App\Task;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();
        factory(Task::class, 100)->create();
    }
}
