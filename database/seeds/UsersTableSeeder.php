<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        //create Admin User
        DB::table('users')->insert([[
        	'name'=>'admin',
            'email'=>'admin@test.com',
            'password' => bcrypt('admin'),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now')
        ]]);

        //create one test user
        DB::table('users')->insert([[
            'name'=>'test',
            'email'=>'test@test.com',
            'password' => bcrypt('test'),
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now')
        ]]);

        //create 100 random users
        for ($i=0; $i < 100; $i++) { 
            DB::table('users')->insert([[
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password' => bcrypt('test'),
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now')
            ]]);
        }

        /*create roles */
        DB::table('roles')->insert([[
            'name' => "admin",
            'created_at' => $faker->dateTime($max = 'now'),
            'updated_at' => $faker->dateTime($max = 'now'),
        ]]);

        /*Assign roles */
        $user = DB::table('users')->where('name', 'admin')->first();
        $role = DB::table('roles')->where('name', 'admin')->first();
        DB::table('role_user')->insert([
            'role_id' => $role->id,
            'user_id' => $user->id,
        ]);
    }
}
