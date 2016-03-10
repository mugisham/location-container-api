<?php
namespace App\Http\Controllers;

use Debugbar;
use App\Transformer\LocationTransformer;
use App\Transformer\ContainerTransformer;
use App\Http\Controllers\ApiControllers;
use  Illuminate\Http\Request;
use App\Repo\Location\LocationInterface;
use League\Fractal\Manager;
use Illuminate\Contracts\Routing\ResponseFactory;

class LocationController extends ApiController{

	protected $location;

	public function __construct(LocationInterface $location, Manager $fractal, ResponseFactory $response)
	{
		parent::__construct($fractal, $response);
		$this->location = $location;
		
		if (isset($_GET['include'])) {
			$this->fractal->parseIncludes($_GET['include']);
		}

	}

	 /**
     * Get all locations
     *
     * @return array
     */
	public function index(){
		$data = $this->location->all();
		$records = $this->respondWithCollection($data, new LocationTransformer);
		return $records;
	}

      /**
     * Get location with id
     * @param Integer $id
     * @return array
     */
	public function show(Request $request, $id)
	{
		$input=$request->all();
		$data = $this->location->findById($id);

		if(!$data){
			return $this->errorNotFound("Id is invalid");
		}
		return $this->respondWithItem($data, new LocationTransformer);
	}

     /**
     * Get location with city name 
     * @param String $city
     * @return array
     */
	public function showCity(Request $request, $city)
	{
		$input=$request->all();
		$data = $this->location->findByCity($id);

		if(!$data){
			return $this->errorNotFound("City is invalid");
		}
		return $this->respondWithCollection($data, new LocationTransformer);
	}
}