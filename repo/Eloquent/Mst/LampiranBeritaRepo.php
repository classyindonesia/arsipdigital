<?php 

namespace Repo\Eloquent\Mst;

use App\Models\Mst\LampiranBerita as Model;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\LampiranBeritaRepoInterface;
use Repo\Filters\Mst\LampiranBeritaFilters;

class LampiranBeritaRepo implements LampiranBeritaRepoInterface
{

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/* standart */
  
	public function all($perPage = null, array $filter = [])
	{
		return $this->filter_data($filter, $perPage);			
	}

	public function find($id)
	{
		return $this->model->find($id);
	}

	public function create(array $data)
	{
		return $this->model->create($data);
	}

	public function update($id, array $data)
	{
		$this->model->where('id', '=', $id)->update($data);
		$q = $this->find($id);
		return $q;
	}

	public function delete($id)
	{
		$q = $this->find($id);
		return $q->delete();
	}

	public function count(array $filter = [])
	{
		$filter = new Request($filter);
		$filter = new LampiranBeritaFilters($filter);	
		$q =  $this->model
				   ->filter($filter)
				   ->count();
		return $q;
	}


	public function filter_data(array $data = [], $perPage = null)
	{
		$data = new Request($data);
		$data = new LampiranBeritaFilters($data);
		if($perPage == null){
			$q =  $this->model
					   ->filter($data)
					   ->orderBy('id', 'DESC')
					   ->get();			
		}else{
			$q =  $this->model
					   ->filter($data)
					   ->orderBy('id', 'DESC')
					   ->paginate($perPage);			
		}

		return $q;
	}	

}