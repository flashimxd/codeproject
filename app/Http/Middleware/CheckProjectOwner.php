<?php

namespace codeproject\Http\Middleware;

use codeproject\Repositories\ProjectRepository;
use Closure;

class CheckProjectOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    private $repository;

    public function __construct(ProjectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle($request, Closure $next)
    {
        $id_usu =  \Authorizer::getResourceOwnerId();
        $id_project = $request->project;

        if(!$this->repository->isOwner($id_project, $id_usu)){
            return ['error' => 'access forbiden'];
        }

        return $next($request);
    }
}
