# Training at Komtar, Penang - 8/8/2016 - 11/8/2016

## Installation

1. Clone this repository and go into the repository

2. Run `composer install`

3. Create a database for application and configure database connection in `.env`

4. Run `php artisan key:generate` and `php artisan migrate`

5. Run `php artisan serve` to serve the application to browser.

# How to create one-to-many relationship

## Create migration script

	php artisan make:migration add_user_id_fk_tasks --table=tasks
	
### Open `database/migrations/<timestamp>_add_user_id_fk_tasks` and add in method `up()`

	Schema::table('tasks', function (Blueprint $table) {
        $table->integer('user_id')->unsigned()->after('id');
    });

### Do migrate

	php artisan migrate

## Update Model

### User Model

	public function tasks()
	{
		return $this->hasMany('App\Task');
	}

### Task Model

	public function user()
	{
		return $this->belongsTo('App\User');
	}

## Setup Factory

	$factory->define(App\Task::class, function (Faker\Generator $faker) {
	    return [
	        'user_id' => $faker->randomElement(range(1,30)),
	        'name' => $faker->name,
	        'description' => $faker->text,
	        'status' => $faker->randomElement(['New','In Progress','Done'])
	    ];
	});

## Setup Task Seeder

### Create Task Seeder

	php artisan make:seeder TasksSeeder

### Open `database\seeds\TasksSeeder` and add `Task` namespace

	use App\Task;

### In `database\seeds\TasksSeeder` and in `run()` method, add the following

	Task::truncate();
	factory(Task::class, 100)->create();

## Open `database\seeds\DatabaseSeeder`, and update the code to the following

	public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(UsersSeeder::class);
        $this->call(TasksSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

## Start seeding

	php artisan db:seed