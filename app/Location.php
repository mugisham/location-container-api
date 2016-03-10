<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = ['name', 'lat', 'lon', 'address', 'city', 'state', 'zip' , 'phone'];


   public function container()
    {
        return $this->belongsToMany(Container::class, 'container_location');
    }
}
