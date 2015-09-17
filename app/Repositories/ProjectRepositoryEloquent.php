<?php

namespace codeproject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeproject\Entities\Project;
use codeproject\Presenters\ProjectPresenter;

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
        $count = $this->findWhere(['id' => $id_project, 'owner_id' => $id_usu]);
        if(count($count['data'])){
            return true;
        }

        return false;

    }

    public function hasMember($id_project, $id_member)
    {
        $project = $this->skipPresenter()->find($id_project);
        foreach( $project->members as $member){
            if($member->id == $id_member){
                return true;
            }  
        }

        return false;
    }

    public function presenter()
    {
        return ProjectPresenter::class;
    }

}