<?php

namespace codeproject\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use codeproject\Entities\Client;
use codeproject\Repositories\ClientRepository;

class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
{
    public function model()
    {
        return Client::class;
    }

}
?>