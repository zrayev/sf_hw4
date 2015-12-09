<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class TeamController extends Controller

{
//       private $teamsData = [
//        'England' => [
//            'name' => 'Team England',
//            'code' => 'England',
//            'players' => [
//                1 => [
//                    'name' => 'Vasia Petrov',
//                    'text' => 'Best player team England'
//                ],
//                2 => [
//                    'name' => 'Petro Pavlov',
//                    'text' => 'Best player team England'
//                ],
//            ],
//            'games' => [
//                [
//                    'name' => 'England - Ukraine',
//                    'score' => '1:6',
//                ],
//            ],
//            'coach' =>  [
//                'name' => 'Vasia Petrov',
//                'text' => 'Best coach team England',
//            ],
//        ],
//
//    ];

    /**
     * @return Response
     * @internal param $name
     */
    public function indexAction()
    {
        $players = array();
        $coaches = array();
        $faker = Factory::create();
        for ($i = 0; $i < 22; $i++) {
            $players[$i] = $faker->firstNameMale;
        }
        $faker = Factory::create();
        for ($i = 0; $i < 2; $i++) {
            $coaches[$i] = $faker->firstNameMale;
        }

         $faker = Factory::create();
        for ($i = 0; $i < 22; $i++) {
            $country[$i] = $faker->country;
        }

//         $faker = Factory::create();
//        for ($i = 0; $i < 22; $i++) {
//            $id[$i] = $faker->randomDigitNotNull;
//        }

        return $this->render("@App/Team/team.html.twig", array(
//            'country' => $country,
            'players' => $players,
            'coaches' => $coaches,
//            'id'=>$id
        ));
    }
}

