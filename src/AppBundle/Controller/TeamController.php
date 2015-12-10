<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class TeamController extends Controller
{

    /**
     * @return Response
     * @internal param $name
     */
    public function indexAction()
    {
        $players = array();
        $coaches = array();

        $faker = Factory::create();

        $country = $faker->country;
        $country_game = $faker->country;
        $score = "$faker->randomDigit".':'."$faker->randomDigit";
        //$score
        for ($i = 0; $i < 22; $i++) {
            $players[$i] = $faker->name;
        }
        $faker = Factory::create();
        for ($i = 0; $i < 5; $i++) {
            $coaches[$i] = $faker->name;
        }

        return $this->render("@App/Team/team.html.twig", array(
            'country' => $country,
            'players' => $players,
            'coaches' => $coaches,
            'country_game' => $country_game,
            'score' => $score
        ));
    }
}

