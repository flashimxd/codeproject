<?php

use Illuminate\Database\Seeder;

class ClienteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \codeproject\Client::truncate();
        factory(\codeproject\Client::class, 10)->create();
    }
}
