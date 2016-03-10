<?php 
namespace App\Transformer;
use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

class LocationTransformer extends TransformerAbstract
{
protected $availableIncludes = [
        'container'
    ];

	public function transform($location){
		return[
             'id'        => (int) $location->id,
            'name'         => $location->name,
            'lat'          => (float) $location->lat,
            'lon'          => (float) $location->lon,
            'address'     => $location->address,
            'city'         => $location->city,
            'state'        => $location->state,
            'zip'          => $location->zip,
            'phone'        => $location->phone,
            'links' =>[
                        'rel' => 'self',
                        'uri'=>'/location/'.$location->id,
            ],
		];
	}

    public function includeContainer($location)
    {
        $container = $location->container;

        return $this->collection($container, new ContainerTransformer);
    }


}