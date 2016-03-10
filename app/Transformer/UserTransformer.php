<?php 
namespace App\Transformer;
use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
	public function transform($user){
		return[
			'id' =>(int) $user->id,
			'name' =>$container->name,
		];
	}

}


