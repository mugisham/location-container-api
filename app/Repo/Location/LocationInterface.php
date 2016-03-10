<?php

namespace App\Repo\Location;

interface LocationInterface{
     /**
     * Get all locations 
     * @return collection
     */
	public function all();

     /**
     * Get location with id
     * @param Integer $id
     * @return collection
     */
	public function findById($id);

     /**
     * Get location with city name 
     * @param String $city
     * @return collection
     */
   public function findByCity($city);

}

