<?php
namespace codeproject\Transformers;
use codeproject\Entities\User;
use League\Fractal\TransformerAbstract;
class ProjectMemberTransformer extends TransformerAbstract
{
	public function transform(User $user)
	{
		return [
					'member_id'  => $user->id
			   ];			
	}
}