<?php 

namespace Repo\Contracts\Mst;

interface HitsRepoInterface
{

	public function countThisDay();

	public function countYesterday();

	public function countThisWeek();

	public function countLastWeek();

	public function countPrevWeek();

	public function all($perPage = null, array $filter = []);

	public function find($id);

	public function create(array $data);

	public function update($id, array $data);

	public function delete($id);

	public function filter_data(array $data = [], $perPage = null);



}