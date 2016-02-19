<?php
namespace codeproject\Transformers;
use codeproject\Entities\Project;
use League\Fractal\TransformerAbstract;
use codeproject\Transformers\ProjectMemberTransformer;
class ProjectTransformer extends TransformerAbstract
{
	protected $defaultIncludes = ['members', 'client'];

	public function transform(Project $project)
	{
		return [
			'client_id'   => $project->client_id,
			'project_id'  => $project->id,
			'name'        => $project->name,
			'description' => $project->description,
			'progress'    => (int)$project->progress,
			'status'      => $project->status,
			'due_date'    => $project->due_date
		];
	}

	public function includeMembers(Project $project)
	{
		return $this->collection($project->members, new ProjectMemberTransformer());
	}


	public function includeClient(Project $project)
	{
		return $this->item($project->client, new ClientTransformer());
	}
}