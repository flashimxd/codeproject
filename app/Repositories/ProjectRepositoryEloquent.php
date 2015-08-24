<?php

namespace codeproject\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use codeproject\Entities\Project;
use codeproject\Repositories\ProjectRepository;

class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    public function model()
    {
        return Project::class;
    }

}
?>