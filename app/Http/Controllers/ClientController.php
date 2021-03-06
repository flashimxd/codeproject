<?php

namespace codeproject\Http\Controllers;

use Illuminate\Http\Request;
use codeproject\Http\Requests;
use codeproject\Repositories\ClientRepository;
use codeproject\Services\ClientService;

class ClientController extends Controller
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

    public function __construct(ClientRepository $repository, ClientService $service )
    {
        $this->repository = $repository;
        $this->service    = $service;
    }
    public function index()
    {
        return $this->repository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
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
        //dd($id, $request->all());
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
        $rs = $this->repository->find($id)->delete();
    }
}
