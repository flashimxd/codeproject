<?php

namespace codeproject\Transformers;

use League\Fractal\TransformerAbstract;
use codeproject\Entities\ProjectFile;

/**
 * Class ProjectFileTransformer
 * @package namespace codeproject\Transformers;
 */
class ProjectFileTransformer extends TransformerAbstract
{

    /**
     * Transform the \ProjectFile entity
     * @param \ProjectFile $model
     *
     * @return array
     */
    public function transform(ProjectFile $model)
    {
        return [
            'id'         => (int)$model->id,

            /* place your other model properties here */

            'name'          =>  $model->name,
            'extension'     =>  $model->extension,
            'description'   =>  $model->description
        ];
    }
}