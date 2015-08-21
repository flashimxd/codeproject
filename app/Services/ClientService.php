<?php
namespace codeproject\Services;
use codeproject\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $dados)
    {
        //add some rules here
        return $this->repository->create($dados);
    }

    public function update(array $dados, $id)
    {
        //add some rules here
        return $this->repository->update($dados, $id);
    }


}