<?php
namespace codeproject\Transformers;
use codeproject\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

class ProjectNoteTransformer extends TransformerAbstract
{

    public function transform(ProjectNote $projectNote)
    {
        return [
            'id'          => $projectNote->id,
            'project_id'  => $projectNote->project_id,
            'title'       => $projectNote->title,
            'note'        => $projectNote->note
        ];
    }

}