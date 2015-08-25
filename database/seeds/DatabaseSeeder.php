<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET foreign_key_checks = 0");
        Model::unguard();

        $this->call(ClienteDatabaseSeeder::class);
        $this->call(ProjectDatabaseSeeder::class);
        $this->call(ProjectNoteDatabaseSeeder::class);

        Model::reguard();
    }
}
