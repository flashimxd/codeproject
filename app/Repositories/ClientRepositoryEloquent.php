<?php

namespace codeproject\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use codeproject\Entities\Client;
use codeproject\Repositories\ClientRepository;
use codeproject\Presenters\ClientPresenter;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }

    public function presenter()
    {
        return ClientPresenter::class;
    }

}
?>