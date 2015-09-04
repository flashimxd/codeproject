<?php

namespace codeproject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeproject\Entities\Project;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace codeproject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }

    public function isOwner($id_project, $id_usu)
    {
        if(count($this->findWhere(['id' => $id_project, 'owner_id' => $id_usu]))){
            return true;
        }

        return false;

    }

    public function hasMember($id_member, $id_project)
    {
        $project = $this->find($project_id);

        foreach( $project->members as $member){
            if($member->id == $id_member){
                return true;
            }    
        }

        return false;
    }

}