<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;
use codeproject\Http\Requests;
use codeproject\Repositories\ProjectFileRepository;
use codeproject\Services\ProjectFileService;
use Storage;
use League\Flysystem\Filesystem;
use File;

class ProjectFileController extends Controller
{

    private $repository;
    private $service;

    public function __construct(ProjectFileRepository $repository, ProjectFileService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    public function index($id)
    {
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

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data = [   'file' => $file, 'extension' => $extension, 'name' => $request->name, 
                    'project_id' => (int)$request->project_id, 'description' => $request->description
                ];

        $this->service->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        if(!$this->service->checkProjectPermissions($id)){
            return ['error' => 'access_forbidden'];
        }

        return $this->repository->find($id);
       
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

        return $this->service->update($request->all(), $id);
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

    /**
     * Envia um arquivo p download
     *
     * @param  int  $id
     * @return Response
     */
    public function showFile($id)
    {
        if(!$this->service->checkProjectPermissions($id)){
            return ['error' => 'access_forbidden'];
        }

        return response()->download($this->service->getFilePath($id));
    }

}