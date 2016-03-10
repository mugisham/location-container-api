<?php

namespace App\Repo\Location;

use Illuminate\Database\Eloquent\Model;

class EloquentLocation implements LocationInterface{
 
     protected $location;

     public function __construct(Model $location)
    {
        $this->location = $location;
    }

	public function all()
	{
		$data = $this->location->with(['container' =>function($query){
			$query->select('containers.id','containers.code','containers.volume','containers.weight');
		}])->select(['locations.id','locations.name','locations.lat','locations.lon','locations.address','locations.city','locations.state','locations.zip','locations.phone'])
		->paginate(15);

       return $data;
	}

	public function findById($id)
	{
	$data = $this->location->with(['container' =>function($query){
			$query->select('containers.id','containers.code','containers.volume','containers.weight');
		}])->select(['locations.id','locations.name','locations.lat','locations.lon','locations.address','locations.city','locations.state','locations.zip','locations.phone'])->where('locations.id', '=', $id)->first();

	 return $data;
	}

	public function findByCity($city)
	{
			$data = $this->location->with(['container' =>function($query){
			$query->select('containers.id','containers.code','containers.volume','containers.weight');
		   }])->select(['locations.id','locations.name','locations.lat','locations.lon','locations.address','locations.city','locations.state','locations.zip','locations.phone'])->where('locations.city', 'like', "$city%")
			->paginate(15);

	 return $data;
		
	}

}
