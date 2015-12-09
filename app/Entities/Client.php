<?php

namespace codeproject\Entities;

use Illuminate\Database\Eloquent\Model;
use codeproject\Entities\Project;

class Client extends Model
{
    protected $fillable = [
        'name',
        'responsible',
        'email',
        'phone',
        'adress',
        'obs'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
