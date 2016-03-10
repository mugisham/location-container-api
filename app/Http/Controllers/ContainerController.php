<?php
namespace App\Http\Controllers;

use App\Transformer\ContainerTransformer;
use App\Http\Controllers\ApiControllers;
use  Illuminate\Http\Request;
use App\Repo\Container\ContainerInterface;
use League\Fractal\Manager;
use Illuminate\Contracts\Routing\ResponseFactory;
use Auth;

class ContainerController extends ApiController{

	protected $container;

	public function __construct(ContainerInterface $container, Manager $fractal, ResponseFactory $response)
	{
		$this->container = $container;
		parent::__construct($fractal, $response);

	}

	 /**
     * Get all containers
     * @return array
     */
	public function index(){
		$data = $this->container->all();
		$records = $this->respondWithCollection($data, new ContainerTransformer);
		return $records;
	}

	 /**
     * Get container with the provided id
     * @param Integer $id
     * @return array
     */
	public function show(Request $request, $id)
	{
		$data = $this->container->findById($id);
		if(!$data){
			return $this->errorNotFound("Id is invalid");
		}
		return $this->respondWithItem($data, new ContainerTransformer);
	}
}