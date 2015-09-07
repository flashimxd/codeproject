<?php
namespace codeproject\Transformers;
use codeproject\Entities\Project;
use League\Fractal\TransformerAbstract;
use codeproject\Transformers\ProjectMemberTransformer;
class ProjectTransformer extends TransformerAbstract
{
	protected $defaultIncludes = ['members'];

	public function transform(Project $project)
	{
		return [
			'project_id'  => $project->id,
			'project'     => $project->name,
			'description' => $project->description,
			'progress'    => $project->progress,
			'status'      => $project->status,
			'due_date'    => $project->due_date
		];
	}

	public function includeMembers(Project $project)
	{
		return $this->collection($project->members, new ProjectMemberTransformer());
	}
}