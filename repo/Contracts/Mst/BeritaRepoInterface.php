<?php 

namespace Repo\Contracts\Mst;

interface BeritaRepoInterface 
{

	public function all($perPage = null, array $filter = []);

	public function find($id);

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);

	public function count(array $filter = []);

	public function filter_data(array $data = [], $perPage = null);


}