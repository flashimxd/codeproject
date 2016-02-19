<?php
namespace codeproject\Services;
use codeproject\Repositories\ProjectRepository;
use codeproject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService
{
    protected $repository;
    protected $validator;
    protected $repositoryProMemb;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator)
    {
        $this->repository         = $repository;
        $this->validator          = $validator;
    }

    public function create(array $dados)
    { 
        try{
            $this->validator->with($dados)->passesOrFail();
            return $this->repository->create($dados);
        }catch( ValidatorException $e){
            return [
                'error'    => true,
                'message' => $e->getMessageBag()
            ];
        }
        
    }


    public function update(array $dados, $id)
    {
         try{
            return $this->repository->update($dados, $id);
        }catch( ValidatorException $e){
            return [
                'error'    => true,
                'message' => $e->getMessageBag()
            ];
        }

    }


    public function createFile(array $data)
    {
        $project = $this->repository->skipPresenter()->find($data['project_id']);
        $projectFile = $project->files()->create($data);

        $this->storage->put($projectFile->id.".".$data['extension'], $this->filesystem->get($data['file']));
    }

    public function checkProjectOwner($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($id, $id_usu);
    }

    public function checkProjectMember($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($id, $id_usu);
    }

    public function checkProjectPermissions($id)
    {
        if($this->checkProjectOwner($id) || $this->checkProjectMember($id)){
            return true;
        }

        return false;
    }


}