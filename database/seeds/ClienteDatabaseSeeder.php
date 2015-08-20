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
        \codeproject\Entities\Client::truncate();
        factory(\codeproject\Entities\Client::class, 10)->create();
    }
}
