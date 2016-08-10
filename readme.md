# Training at Komtar, Penang - 8/8/2016 - 11/8/2016

## Installation

1. Clone this repository and go into the repository

2. Run `composer install`

3. Create a database for application and configure database connection in `.env`

4. Run `php artisan key:generate` and `php artisan migrate`

5. Run `php artisan serve` to serve the application to browser.

# How to create an authenticated application

Open up the terminal and go to the application directory. 
Then run the following to create a login, register and forget password page.

	php artisan make:auth

You may now access `http://localhost:8000/`. You should be able to see a welcome page with navigation to login and register page.

# How to create a page

## Define route in `app/Http/routes.php`

	Route::resource('tasks','TasksController');

## Create controller

	php artisan make:controller TasksController --resource

## Create views in `resources/views` with following structure

	resources/
		|--views/
			|--tasks/
				|--create.blade.php
				|--edit.blade.php
				|--index.blade.php
				|--show.blade.php

## Open up `app/Http/Controlles/TasksController.php` and update the `index`,`show`,`edit` and `create` method to load their view

	public function index()
	{
		return view('tasks.index');
	}

	public function create()
	{
		return view('tasks.create');
	}

	public function edit($id)
	{
		return view('tasks.edit');
	}

	public function show($id)
	{
		return view('tasks.show');
	}
	
## Open up each views and update the views with the following template

	@extends('layouts.app')

	@section('content')

	@endsection

# How to create a restricted page (require username and password)

Open up your `app/Http/routes.php`, and add a Route group and include the middleware for the group like the following

	Route::group(['middleware' => ['auth']], function() {
		Route::resource('tasks', 'TasksController');
	});

You may logout from your application and try to access `http://localhost:8000/tasks`. You will be redirect to login page if you're not logged in yet.

The other option to setup the middleware is as following:

	Route::get('profile','UsersControllers@profile')->middleware(['auth']);

The last option to set restricted page is to use in controller's constructor.

	class HomeController extends Controller
	{
	    public function __construct()
	    {
	        $this->middleware('auth');
	    }
	}

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

### Open `database\seeds\DatabaseSeeder`, and update the code to the following

	public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(UsersSeeder::class);
        $this->call(TasksSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

## Start seeding

	php artisan db:seed

## Usage in `resources/views/tasks/index.blade.php`, add in new column

	<td>{{ $task->user->name }}</td>


















