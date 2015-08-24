<?php

use Illuminate\Database\Seeder;

class ProjectDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \codeproject\Entities\Project::truncate();
        factory(\codeproject\Entities\Project::class, 10)->create();
    }
}
