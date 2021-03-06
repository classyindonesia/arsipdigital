<?php 

namespace Repo\Eloquent\Mst;

use App\Models\Mst\PasswordMedia as Model;
use Illuminate\Http\Request;
use Repo\Contracts\Mst\PasswordMediaRepoInterface;
use Repo\Filters\Mst\PasswordMediaFilters;

class PasswordMediaRepo implements PasswordMediaRepoInterface
{

	protected $model;

	public function __construct(Model $model)
	{
		$this->model = $model;
	}


    public function getAllDropdown()
    {
        $data = ['' => '-tanpa password-'];
        foreach ($this->all() as $list) {
            $data[$list->id] = $list->nama;
        }
        return $data;
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
		$data = new PasswordMediaFilters($data);
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