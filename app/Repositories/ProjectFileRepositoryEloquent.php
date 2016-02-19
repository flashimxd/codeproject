<?php

namespace codeproject\Repositories;

use codeproject\Entities\ProjectFile;
use codeproject\Presenters\ProjectFilePresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use codeproject\Repositories\ProjectFilesRepository;
use codeproject\Entities\ProjectMembers;

/**
 * Class ProjectMembersRepositoryEloquent
 * @package namespace codeproject\Repositories;
 */
class ProjectFileRepositoryEloquent extends BaseRepository implements ProjectFileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectFile::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app(RequestCriteria::class) );
    }


    public function checkProjectFileOwner($id_project)
    {
        if(count($this->findWhere(['project_id' => $id_project]))){
            return true;
        }

        return false;
    }

    public function presenter()
    {
        return ProjectFilePresenter::class;
    }
}