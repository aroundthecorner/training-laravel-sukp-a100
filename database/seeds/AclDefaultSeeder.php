<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Permission;

class AclDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
    	Permission::truncate();
    	
    	DB::table('permission_role')->truncate();
    	DB::table('role_user')->truncate();
        // create default roles
        $admin = new Role();
		$admin->name         = 'administrator';
		$admin->display_name = 'User Administrator';
		$admin->description  = 'User is allowed to manage and edit other users'; 
		$admin->save();
        // create default permissions
        $permissions = [
        	[
        		'name' => 'user-create',
        		'display_name' => 'Create User',
        		'description' => 'User who are allowed to add new user'
        	],
        	[
        		'name' => 'user-read',
        		'display_name' => 'Read User',
        		'description' => 'User who are allowed to read user'
        	],
        	[
        		'name' => 'user-update',
        		'display_name' => 'Update User',
        		'description' => 'User who are allowed to update new user'
        	],
        	[
        		'name' => 'user-delete',
        		'display_name' => 'Delete User',
        		'description' => 'User who are allowed to delete user'
        	],
        ];
        foreach ($permissions as $key => $value) {
        	$permission = new Permission();
			$permission->name         = $value['name'];
			$permission->display_name = $value['display_name']; 
			$permission->description  = $value['description'];
			$permission->save();
			
			// assign permission to roles
			$admin->attachPermission($permission);
        }
        // create default user and attach admin role to the user
        $user = new User();
        $user->name = 'Administrator';
        $user->email = 'admin@system.com';
        $user->password = bcrypt('password');
        $user->remember_token = str_random(10);
        $user->save();
        
        $user->attachRole($admin);
    }
}