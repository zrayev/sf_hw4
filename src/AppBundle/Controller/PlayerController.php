<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class PlayerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction($country)
    {
        $faker = Factory::create();
        $info = $faker->realText($maxNbChars = 1000);
        $name = $faker->name;
        return $this->render("@App/Player/player.html.twig", array(
            'name' => "$name",
            'info' => "$info",
            'country' => "$country",
        ));
    }
}
