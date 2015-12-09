<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class CoachController extends Controller

{

    /**
     * @return Response
     */
    public function indexAction()
    {
        $faker = Factory::create();
        $text = $faker->realText($maxNbChars = 1000);
        $name = $faker->name;
        return $this->render("@App/Country/country.html.twig", array(
            'name' => "$name",
            'text' => "$text"
        ));
    }
}
