<?php
namespace codeproject\Services;
use codeproject\Repositories\ProjectTaskRepository;
use codeproject\Validators\ProjectTaskValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectTaskService
{
    protected $repository;
    protected $validator;

    public function __construct(ProjectTaskRepository $repository, ProjectTaskValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
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


}