<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class CountryController extends Controller

{
    public function indexAction($name)
    {
        $faker = Factory::create();
        $text = $faker->realText($maxNbChars = 3000);
        return $this->render("@App/Country/country.html.twig", array(
            'name' => "$name",
            'text' => "$text"
        ));
    }
}
