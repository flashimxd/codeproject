<?php

use Illuminate\Database\Seeder;

class ProjectNoteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \codeproject\Entities\ProjectNote::truncate();
        factory(\codeproject\Entities\ProjectNote::class, 10)->create();
    }
}












