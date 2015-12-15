<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Faker\Factory;

class DefaultController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $countries = array();
        $faker = Factory::create();
        $img = $faker->imageUrl(22, 15);
        for ($i = 0; $i < 25; $i++) {
            $countries[$i] = $faker->country;
        }
        return $this->render("@App/Default/index.html.twig", array(
            'countries' => $countries,
            'img' => $img
        ));
    }
}
