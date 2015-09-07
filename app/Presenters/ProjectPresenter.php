<?php
namespace codeproject\Presenters;
use codeproject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{
	public function getTransformer()
	{
		return new ProjectTransformer();
	}
}