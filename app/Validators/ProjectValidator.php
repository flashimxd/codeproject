<?php
namespace codeproject\Validators;
use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules  = [
        'owner_id'    => 'required| integer',
        'client_id'   => 'required| integer',
        'name'        => 'required|max:255',
        'progrress'   => 'required|',
        'status'      => 'required',
        'due_date'    => 'required| date',
    ];

}
?>