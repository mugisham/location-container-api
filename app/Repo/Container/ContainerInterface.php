<?php

namespace App\Repo\Container;

interface ContainerInterface{
      /**
     * Get all Containers
     * @return collection
     */
	public function all();

       /**
     * Get container with id
     * @param Integer $id
     * @return collection
     */
	public function findById($id);

}

