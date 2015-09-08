<?php

namespace codeproject\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use \codeproject\Entities\ProjectNote;
use \codeproject\Entities\Client;
use \codeproject\Entities\User;
use \codeproject\Entities\ProjectFile;;

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

    public function members()
    {
        return $this->belongsToMany(User::class, 'project_members', 'project_id', 'member_id');
    }

    public function note()
    {
        return $this->hasMany(ProjectNote::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function owner()
    {
        return $this->hasOne(User::class);
    }

    public function files()
    {
        return $this->hasMany(ProjectFile::class);
    }

}
