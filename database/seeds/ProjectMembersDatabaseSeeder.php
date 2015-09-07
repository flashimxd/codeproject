<?php

use Illuminate\Database\Seeder;

class ProjectMembersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \codeproject\Entities\ProjectMembers::truncate();

        factory(\codeproject\Entities\ProjectMembers::class)->create(
            [
                'project_id' => 2,
                'member_id' => 1
            ]
        );
        
        factory(\codeproject\Entities\ProjectMembers::class, 10)->create();
    }
}
