<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Coach;
use Faker\Factory;

class CoachController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction($country)
    {
//         $i = 0;
//            while($i++ < 5) {
//                $faker = Factory::create();
//                $coach = new Coach();
//                $em = $this->getDoctrine()->getManager();
//                $coach->setName($faker->name);
//                $coach->setText($faker->text(2000));
//                //$coaches = $em->getRepository("AppBundle:Coach")->findAll();
//                $em->persist($coach);
//                $em->flush();
//            }
//        return new Response('Created product id '.$coach->getId());
//
//        return [
//            "coach" => $coach
//        ];

        $faker = Factory::create();
        $text = $faker->realText($maxNbChars = 1000);
        $name = $faker->name;
        return $this->render("@App/Coach/coach.html.twig", array(
            'name' => "$name",
            'text' => "$text",
            'country' => "$country",
        ));
    }
}
