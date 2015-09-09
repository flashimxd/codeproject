<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;
use codeproject\Http\Requests;
use codeproject\Repositories\ProjectRepository;
use codeproject\Services\ProjectService;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    /**
     * @var ClientRepository
     * */
    private $repository;
    private $service;

    public function __construct(ProjectRepository $repository, ProjectService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    public function index()
    {
        return $this->repository->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if(!$this->checkProjectPermissions($id)){
            return ['error' => 'access_forbidden'];
        }

        return $this->repository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        $id_project = $request->project;

        if(!$this->repository->isOwner($id_project, $id_usu)){
            return ['error' => 'access forbiden'];
        }

        return $this->repository->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        $id_project = $request->project->id_project;

        if(!$this->checkProjectOwner($id_project)){
            return ['error' => 'access forbiden'];
        }

        return $this->repository->find($id)->delete();
    }

    private function checkProjectOwner($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->isOwner($id, $id_usu);
    }

    private function checkProjectMember($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->hasMember($id, $id_usu);
    }

    private function checkProjectPermissions($id)
    {
        if($this->checkProjectOwner($id) or $this->checkProjectMember($id)){
            return true;
        }

        return false;
    }

}