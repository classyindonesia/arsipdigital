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


	public function countThisDay()
	{
		$today = Carbon::now()->toDateString();
		return $this->model
					->where('tgl', '=', $today)		
					->count();		
	}

	public function countYesterday()
	{
		$today = Carbon::yesterday()->toDateString();
		return $this->model
					->where('tgl', '=', $today)		
					->count();		
	}

	public function countPrevDay()
	{
		$today = Carbon::yesterday()->subDay(1)->toDateString();
		return $this->model
					->where('tgl', '=', $today)		
					->count();			
	}


	public function countThisMonth()
	{
		$fromDate = Carbon::now()->startOfMonth()->toDateString();
		$tillDate = Carbon::now()->toDateString();

		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
	}

	public function countLastMonth()
	{
		// ambil tanggal di hari bulan kemarin
		$fromDate =  Carbon::parse('Monday last month')->subMonth(1)->toDateString();
		// ambil tanggal di hari terakhir dalam bulan kemarin
		$tillDate = Carbon::parse('Monday last month')->subMonth(1)->endOfMonth()->toDateString();
		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
	}


	public function countPrevMonth()
	{
		// ambil tanggal di hari minggu kemarin
		$fromDate =  Carbon::parse('Monday this month')->subMonths(2)->toDateString();
		// ambil tanggal di hari terakhir dalam minggu kemarin
		$tillDate = Carbon::parse('Monday this month')->subMonths(2)->endOfMonth()->toDateString();
		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
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
		// ambil tanggal di hari minggu kemarin
		$fromDate =  Carbon::parse('Monday last week')->toDateString();
		// ambil tanggal di hari terakhir dalam minggu kemarin
		$tillDate = Carbon::parse('Monday last week')->endOfWeek()->toDateString();
		return $this->model
					->whereBetween('tgl', [$fromDate, $tillDate])		
					->count();
	}


	public function countPrevWeek()
	{
		// ambil tanggal di hari minggu kemarin
		$fromDate =  Carbon::parse('Monday this week')->subWeeks(2)->toDateString();
		// ambil tanggal di hari terakhir dalam minggu kemarin
		$tillDate = Carbon::parse('Monday this week')->subWeeks(2)->endOfWeek()->toDateString();
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