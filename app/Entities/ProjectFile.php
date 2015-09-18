<?php

namespace codeproject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use \codeproject\Entities\User;
use \codeproject\Entities\Project;

class ProjectFile extends Model implements Transformable
{
    use TransformableTrait;

     protected $fillable = [
        'name',
        'description',
        'extension'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
