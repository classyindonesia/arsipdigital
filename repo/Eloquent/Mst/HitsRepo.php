<?php 

namespace Repo\Eloquent\Mst;

use App\Models\Mst\Hit as Model;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\HitsRepoInterface;
use Repo\Filters\Mst\HitsFilters;
use Carbon\Carbon;

class HitsRepo implements HitsRepoInterface
{

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	public function countThisWeek()
	{
		$fromDate = Carbon::now()->subDay()->startOfWeek()->toDateString();
		$tillDate = Carbon::now()->toDateString();

		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
	}

	public function countLastWeek()
	{
		// ambil tanggal di hari minggu ini
		$fromDate = Carbon::now()->subDay()->startOfWeek()->toDateString();
		$fromDate = $fromDate->previous(Carbon::MONDAY);
		// ambil tanggal sekarang
		$tillDate = Carbon::now()->toDateString();

		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
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


	public function filter_data(array $data = [], $perPage = null)
	{
		$data = new Request($data);
		$data = new HitsFilters($data);
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