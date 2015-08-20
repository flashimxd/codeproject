<?php

namespace codeproject\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;
use codeproject\Entities\Client;

class ClientRepositoryEloquent extends BaseRepository
{
    public function model()
    {
        return Client::class;
    }

}
?>