<?php
namespace codeproject\Transformers;
use codeproject\Entities\Client;
use League\Fractal\TransformerAbstract;
use codeproject\Transformers\ClientTransformer;
class ClientTransformer extends TransformerAbstract
{

    public function transform(Client $client)
    {
        return [
            'id'          => $client->id,
            'name'        => $client->name,
            'responsible' => $client->responsible,
            'email'       => $client->email,
            'phone'       => $client->phone,
            'adress'      => $client->adress,
            'obs'         => $client->obs
        ];
    }

}