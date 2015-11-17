<?php
namespace codeproject\Presenters;
use codeproject\Transformers\ClientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ClientPresenter extends FractalPresenter
{
    public function getTransformer()
    {
        return new ClientTransformer();
    }
}