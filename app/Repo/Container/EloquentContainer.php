<?php

namespace App\Repo\Container;

use Illuminate\Database\Eloquent\Model;

class EloquentContainer implements ContainerInterface{
	
	protected $container;

	public function __construct(Model $container)
	{
		$this->container = $container;
	}

	public function all()
	{
		$data = $this->container->select('containers.id','containers.code','containers.volume','containers.weight')
		->paginate(15);
		return $data;
	}
	public function findById($id)
	{
		$data = $this->container->select('containers.id','containers.code','containers.volume','containers.weight')
		->where('containers.id', '=', $id)->first();
		return $data;
	}

}
