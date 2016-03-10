<?php 
namespace App\Transformer;
use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

class ContainerTransformer extends TransformerAbstract
{
	public function transform($container){
		return[
			'id' =>(int) $container->id,
			'code' =>$container->code,
			'volume' =>(int)$container->volume,
			'weight' =>(int)$container->weight,
			'links' =>[
						'rel' => 'self',
						'uri'=>'/container/'.$container->id,
			]
		];
	}
}