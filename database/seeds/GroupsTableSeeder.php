<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	/* Create Group roles*/
    	DB::table('group_roles')->insert([[
        	'name'=>$faker->company,
            'description'=>$faker->text($maxNbChars = 200),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]]);

        //create 50 random groups with random admin and members
    	for ($i=0; $i < 50 ; $i++) { 
    		DB::table('groups')->insert([[
	        	'name'=>$faker->company,
	            'description'=>$faker->text($maxNbChars = 200),
	            'approval'=>rand(0,1),
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')
	        ]]);
    	}

        /*
        *   create 5 groups with test user as admin and other random members & followers
        */
        	//create groups
    	for ($i=0; $i < 5; $i++) { 
    		DB::table('groups')->insert([[
	        	'name'=>$faker->company,
	            'description'=>$faker->text($maxNbChars = 200),
	            'approval'=>rand(0,1),
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')
	        ]]);
    	}
    		//add test user as admin
    	$tuser = DB::table('users')->where('name', 'test')->first();
    		//add random followers




        //create 5 groups where test user has different group roles
    }
}
