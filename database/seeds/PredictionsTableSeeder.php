<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PredictionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();	



        //create 100 random predictions from test user_error
		$tuser = DB::table('users')->where('name', 'test')->first();
		$visibilities = ["public","private","followers"];
		$directions = ["up","down"];
		$start_date = $faker->dateTimeBetween($startDate = '- 15 days', $endDate = '+ 15 days', $timezone = date_default_timezone_get());
        $end_date = $start_date->add(new DateInterval('P5D'));
        for ($i=0; $i < 100 ; $i++) { 
        	$stock = DB::table('stocks')->inRandomOrder()->first();
    		//prediction id
        	DB::table('predictions')->insert([[
	        	'user_id'=>$tuser->id,
	            'stock_id'=>$stock->id,
	            'description'=>$faker->text($maxNbChars = 200),
	            'period_start'=>$start_date,
	            'period_end'=>$end_date,
	            'direction'=>$directions[array_rand($directions, 1)],
	            'amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 99),
	            'visibility'=>$visibilities[array_rand($visibilities, 1)],
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')
	        ]]);
        }

        //create random predictions from users that test user follows
        	//random predictions
        for ($i =0; $i < 100 ; $i++) { 
        	$stock = DB::table('stocks')->inRandomOrder()->first();
        	$ruser =DB::table('users')->inRandomOrder()->first();
        	$start_date = $faker->dateTimeBetween($startDate = '- 15 days', $endDate = '+ 15 days', $timezone = date_default_timezone_get());
        	$end_date = $start_date->add(new DateInterval('P5D'));
        	DB::table('predictions')->insert([[
	        	'user_id'=>$ruser->id,
	            'stock_id'=>$stock->id,
	            'description'=>$faker->text($maxNbChars = 200),
	            'period_start'=>$start_date,
	            'period_end'=>$end_date,
	            'direction'=>$directions[array_rand($directions, 1)],
	            'amount'=>$faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 99),
	            'visibility'=>$visibilities[array_rand($visibilities, 1)],
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')
	        ]]);
        }
        
        	//get all predictions 
        $tuser = DB::table('users')->where('name', 'test')->first();
        $rpredictions = DB::table('predictions')->where('user_id', '!=',$tuser->id)->get();
        foreach ($rpredictions as $prd) {
        	DB::table('prediction_votes')->insert([[
	        	'user_id'=>$tuser->id,
	            'prediction_id'=>$prd->id,
	            'like'=>rand(0,1),
	            'created_at' => date('Y-m-d H:i:s'),
	            'updated_at' => date('Y-m-d H:i:s')
	        ]]);
        }
        
        //create 5 random prediction likes for each prediction
        $apredictions = DB::table('predictions')->get();
        foreach ($apredictions as $prd) {
			$ruser =DB::table('users')->where('id','!=',$prd->user_id)->inRandomOrder()->first();
			for($i =0; $i < 5 ; $i++){
				DB::table('prediction_votes')->insert([[
					'user_id'=>$tuser->id,
					'prediction_id'=>$prd->id,
					'like'=>rand(0,1),
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				]]);
			}
        }
    }
}
