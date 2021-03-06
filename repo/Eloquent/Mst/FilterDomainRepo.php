<?php 

namespace Repo\Eloquent\Mst;

use App\Models\Mst\FilterDomainRegistrasi as Model;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\FilterDomainRepoInterface;
use Repo\Filters\Mst\FilterDomainFilters;

class FilterDomainRepo implements FilterDomainRepoInterface
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
		if(count($q)>0){
			$q->delete();			
			return 'data telah terhapus';
		}else{
			return 'data tdk ditemukan';
		}
	}


	public function filter_data(array $data = [], $perPage = null)
	{
		$data = new Request($data);
		$data = new FilterDomainFilters($data);
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