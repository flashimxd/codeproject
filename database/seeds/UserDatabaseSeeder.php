<?php

use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	\codeproject\Entities\User::truncate();
    	
    	factory(\codeproject\Entities\User::class)->create(
    		[
    			'name' => 'Rangel Netto',
		        'email' => 'j.rangel.flash@gmail.com',
		        'password' => bcrypt(123456),
		        'remember_token' => str_random(10),
		    ]
    	);

        factory(\codeproject\Entities\User::class, 10)->create();
    }
}
