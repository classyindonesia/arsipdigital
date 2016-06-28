<?php

namespace Repo\Contracts;



interface SetupVariableInterface
{

	public function getByVariable($variable);

	public function updateByVariable($variable, $value);

	public function deleteByVariable($variable);
 

}
