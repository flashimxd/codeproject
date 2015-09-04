<?php
namespace codeproject\Services;
use codeproject\Repositories\ProjectRepository;
use codeproject\Repositories\ProjectMembersRepository;
use codeproject\Validators\ProjectValidator;
use Prettus\Validator\Exceptions\ValidatorException;
class ProjectService
{
    protected $repository;
    protected $validator;
    protected $repositoryProMemb;

    public function __construct(ProjectRepository $repository, ProjectValidator $validator, ProjectMembersRepository $repositoryProMemb)
    {
        $this->repository         = $repository;
        $this->validator          = $validator;
        $this->repositoryProMemb  = $repositoryProMemb;
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

    public function addMemeber(array $dados)
    {
        try{
            return $this->repositoryProMemb->create($dados);
        }catch(ValidatorException $e){
            return [
                'error'    => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function removeMember($id)
    {
        try{
            return $this->repositoryProMemb->find($id)->delete($id);
        }catch(ValidatorException $e){
            return [
                'error'    => true,
                'message' => $e->getMessageBag()
            ];
        }
    }


    private function isMember($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($id, $id_usu);
    }


}