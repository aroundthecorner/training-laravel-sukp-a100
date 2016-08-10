# Training at Komtar, Penang - 8/8/2016 - 11/8/2016

## Installation

1. Clone this repository and go into the repository

2. Run `composer install`

3. Create a database for application and configure database connection in `.env`

4. Run `php artisan key:generate` and `php artisan migrate`

5. Run `php artisan serve` to serve the application to browser.

# How to create one-to-many relationship

## Create migration script

	```
	php artisan make:migration add_user_id_fk_tasks --table=tasks
	```
	
### in `timestamp_add_user_id_fk_tasks`

	```
	$table->integer('user_id')->unsigned()->after('id');
	```

## Update Model

### User Model

	```
	public function tasks()
	{
		return $this->hasMany('App\Task');
	}
	```

### Task Model

	```
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	```

## Setup Factory

	```
	$factory->define(App\Task::class, function (Faker\Generator $faker) {
	    return [
	        'user_id' => $faker->randomElement(range(1,30)),
	        'name' => $faker->name,
	        'description' => $faker->text,
	        'status' => $faker->randomElement(['New','In Progress','Done'])
	    ];
	});
	```

## Setup Task Seeder

### Create Task Seeder

	```
	php artisan make:seeder TasksSeeder
	```

### Update TaskSeeders

### Add `Task` namespace

	```
	use App\Task;
	```

### In `run()` method
	```
	Task::truncate();
	factory(Task::class, 100)->create();
	```

## Start seeding

	```
	php artisan db:seed
	```