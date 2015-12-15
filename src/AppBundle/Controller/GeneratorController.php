<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Coach;
use Faker\Factory;

class GeneratorController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction()
    {
         $i = 0;
            while($i++ < 5) {
                $faker = Factory::create();
                $coach = new Coach();
                $em = $this->getDoctrine()->getManager();
                $coach->setName($faker->name);
                $coach->setText($faker->text(2000));
                //$coaches = $em->getRepository("AppBundle:Coach")->findAll();
                $em->persist($coach);
                $em->flush();
            }
        return new Response('Created product id '.$coach->getId());
//        return [
//            "coach" => $coach
//        ];
    }
}
