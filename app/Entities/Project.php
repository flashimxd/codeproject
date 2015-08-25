<?php

namespace codeproject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use \codeproject\Entities\ProjectNote;

class Project extends Model implements Transformable
{
    use TransformableTrait;

     protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function note()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function client()
    {
        return $this->hasOne(ProjectNote::class);
    }

    public function owner()
    {
        return $this->hasOne(ProjectNote::class);
    }

}
