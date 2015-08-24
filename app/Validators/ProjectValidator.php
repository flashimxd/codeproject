<?php
namespace codeproject\Validators;
use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules  = [
        'owner_id'    => 'required',
        'client_id'   => 'required',
        'name'        => 'required|max:255',
        'descripion'  => 'required',
        'progrress'   => 'required|',
        'status'      => 'required',
        'due_date'    => 'required|',
        'adress'      => 'required'
    ];

}