<?php 

namespace Repo\Contracts\Mst;

interface UserRegistrationRepoInterface 
{

	public function all($perPage = null, array $filter = []);

	public function find($id);

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);

	public function findBy(array $data = []);

	public function filter_data(array $data = [], $perPage = null);


}