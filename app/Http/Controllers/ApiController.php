<?php
namespace App\Http\Controllers;

use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Manager;
use Illuminate\Contracts\Routing\ResponseFactory;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Event;

class ApiController extends Controller
{

    protected $statusCode = 200;
   	protected $fractal;
   	protected $response;
  

    public function __construct(Manager $fractal, ResponseFactory $response)
    {
        $this->fractal = $fractal;
        $this->response = $response;
    }

    /**
     * Get statusCode
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     * Set for statusCode
     *
     * @param int 
     *
     * @return self
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }
    
    protected function respondWithItem($item, $callback)
    {
        $resource = new Item($item, $callback);

        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithCollection($collection, $callback)
    {
        $resource = new Collection($collection, $callback);
        $resource->setPaginator(new IlluminatePaginatorAdapter($collection));
        $rootScope = $this->fractal->createData($resource);

        return $this->respondWithArray($rootScope->toArray());
    }

    protected function respondWithArray(array $array, array $headers = [])
    {
    	
        $response = $this->response->json($array, $this->statusCode, $headers);

         $response->header('Content-Type', 'application/json');

        return $response;
    }


      protected function respondWithError($message)
    {

        return $this->respondWithArray([
            'error' => [
                'http_code' => $this->statusCode,
                'message' => $message,
            ]
        ]);
    }

    /**
     * Generates a Response with a 403
     *
     * @return Response
     */
    public function errorForbidden($message = 'Forbidden')
    {
        return $this->setStatusCode(403)
          ->respondWithError($message);
    }

    /**
     * Generates a Response with a 500 
     *
     * @return Response
     */
    public function errorInternalError($message = 'Internal Error')
    {
        return $this->setStatusCode(500)
          ->respondWithError($message);
    }
    
    /**
     * Generates a Response with a 404 
     *
     * @return Response
     */
    public function errorNotFound($message = 'Resource Not Found')
    {
        return $this->setStatusCode(404)
          ->respondWithError($message);
    }

    /**
     * Generates a Response with a 401 
     *
     * @return Response
     */
    public function errorUnauthorized($message = 'Unauthorized')
    {
        return $this->setStatusCode(401)
          ->respondWithError($message);
    }

    /**
     * Generates a Response with a 400 
     *
     * @return Response
     */
    public function errorWrongArgs($message = 'Wrong Arguments')
    {
        return $this->setStatusCode(400)
          ->respondWithError($message);
    }
}




