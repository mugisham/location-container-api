<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class ContainerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(App\Container::class, 50)->create();
    }
}


