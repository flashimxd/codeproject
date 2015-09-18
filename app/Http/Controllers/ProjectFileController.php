<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;
use codeproject\Http\Requests;
use codeproject\Repositories\ProjectFileRepository;
use codeproject\Services\ProjectService;
use Storage;
use League\Flysystem\Filesystem;
use File;

class ProjectFileController extends Controller
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

    public function __construct(ProjectFileRepository $repository, ProjectService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    public function index()
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
        /*
        if(!$this->checkProjectPermissions($id)){
            return ['error' => 'access_forbidden'];
        }
        */

        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();

        $data = [   'file' => $file, 'extension' => $extension, 'name' => $request->name, 
                    'project_id' => $request->project_id, 'description' => $request->description
                ];

        $this->service->createFile($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
       
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    
    }

    private function checkProjectFileOwner($id)
    {
        return $this->repository->checkProjectFileOwner($id);
    }

}