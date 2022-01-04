<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $newslist = [
        [
            'id' => 0,
            'title' => 'News 1',
            'author' => '',
            'image' => null,
            'description' => ''
        ]
    ];

    public function getNews(): array
    {
        $faker = Factory::create();
        $data = [];
        for($i=0; $i<10; $i++)
            {
                $data[] = [
                    'id' => $i,
                    'title' => $faker->title(),
                    'author' => $faker->jobTitle(),
                    'image' => null,
                    'description' => $faker->sentence(10)
                ];
            }
        return  $data;
    }
}
