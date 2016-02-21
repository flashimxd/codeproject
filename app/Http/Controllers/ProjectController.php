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
        return $this->repository->with('client')->findWhere(['owner_id' => \Authorizer::getResourceOwnerId()]);
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


    public function show($id)
    {
        dd($id);
        
        if(!$this->service->checkProjectPermissions($id)){
            return ['error' => 'access_forbidden'];
        }

        return $this->repository->with('client')->find($id);
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
        if($this->service->checkProjectOwner($id)  == false){
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

        if($this->service->checkProjectOwner($id)  == false){
            return ['error' => 'access forbiden'];
        }

        if($this->repository->skipPresenter()->find($id)->delete())
            return array('success' => true);

        return array('success' => false);
    }

}