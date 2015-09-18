<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;

use codeproject\Http\Requests;
use codeproject\Http\Controllers\Controller;
use codeproject\Repositories\ProjectTaskRepository;
use codeproject\Services\ProjectTaskService;

class ProjectTaskController extends Controller
{

    /**
     * @var ProjectTaskRepository
     * */
    private $repository;
    private $service;

    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        if(!$this->checkTaskOwner($id)){
            return ['error' => 'access forbiden'];
        }
        
        return $this->repository->findWhere(['project_id' => $id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function checkTaskOwner($id)
    {
        return $this->repository->isOwner($id);
    }

}
