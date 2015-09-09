<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;
use codeproject\Http\Requests;
use codeproject\Repositories\ProjectNoteRepository;
use codeproject\Services\ProjectNoteService;

class ProjectNoteController extends Controller
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

    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    
    public function index($id)
    {
        if(!$this->checkNoteOwner($id_project)){
            return ['error' => 'access forbiden'];
        }

        return $this->repository->findWhere(['project_id' => $id]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        if(!$this->checkNoteOwner($id_project)){
            return ['error' => 'access forbiden'];
        }

        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id, $id_note)
    {
        if(!$this->checkNoteOwner($id_project)){
            return ['error' => 'access forbiden'];
        }

        return $this->repository->findWhere(['project_id' => $id, 'id' => $id_note ]);
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
    public function update(Request $request, $id, $id_note)
    {
        if(!$this->checkNoteOwner($id)){
            return ['error' => 'access forbiden'];
        }

        return $this->repository->update($request->all(), $id_note);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id, $id_note)
    {
        if(!$this->checkNoteOwner($id)){
            return ['error' => 'access forbiden'];
        }

        $rs = $this->repository->find($id_note)->delete();
    }

    private function checkNoteOwner($id)
    {
        return $this->repository->isOwner($id);
    }
}
