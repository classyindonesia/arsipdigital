<?php 

namespace Repo\Eloquent;


use App\Models\SetupVariable as Model;
use Repo\Contracts\SetupVariableInterface;

class SetupVariable implements SetupVariableInterface
{

	protected $model;
	public function __construct(Model $model){
		$this->model = $model;
	}


	public function getByVariable($variable)
	{
		return $this->model->where('variable', '=', $variable)->first();
	}

	public function updateByVariable($variable, $value)
	{
		$v = $this->model->where('variable', '=', $variable)->first();
		$v->value = $value;
		$v->save();
		
		return $v;	
	}

	public function deleteByVariable($variable)
	{
		$v = $this->getByVariable($variable);
		$v->delete();
		return 'data variable telah terhapus';
	}


 
}