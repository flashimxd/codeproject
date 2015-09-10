<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;

use codeproject\Http\Requests;
use codeproject\Http\Controllers\Controller;
use codeproject\Repositories\ProjectMembersRepository;
use codeproject\Services\ProjectMembersService;

class ProjectMembersController extends Controller
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
    //TODO criar service
    public function __construct(ProjectMembersRepository $repository, ProjectMembersService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }

    public function index($id)
    {

        if(!$this->checkProjectMember($id)){
            return ['error' => 'access_forbidden'];
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
        //
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

    private function checkProjectMember($id)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        return $this->repository->isMember($id, $id_usu);
    }
}
