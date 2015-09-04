<?php

use Illuminate\Database\Seeder;

class ProjectTaskDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \codeproject\Entities\ProjectTask::truncate();
        factory(\codeproject\Entities\ProjectTask::class, 10)->create();
    }
}
