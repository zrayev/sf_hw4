<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Coach;
use AppBundle\Entity\Country;
use AppBundle\Entity\Player;
use AppBundle\Entity\Team;
use Faker\Factory;

class GeneratorController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $faker = Factory::create();
        $i = 0;
        while($i++ < 10) {
            $country = new Country();
            $em = $this->getDoctrine()->getManager();
            $country->setName($faker->country);
            $country->setInfo($faker->text(1000));
            $country->setFlag($faker->imageUrl(22, 15));
            $em->persist($country);
            $em->flush();

        $t = 0;
        while ($t++ <1) {
            $team = new Team();
            $em = $this->getDoctrine()->getManager();
            $team->setCountry($country->getName());
            $team->setCountryGame($faker->country);
            $team->setScore("$faker->randomDigit".':'."$faker->randomDigit");
            $em->persist($team);
            $em->flush();

         $c = 0;
            while($c++ < 2) {
                $coach = new Coach();
                $em = $this->getDoctrine()->getManager();
                $coach->setName($faker->name);
                $coach->setInfo($faker->text(2000));
                $coach->setCountry($country->getName());
                $coach->setTeam($team);
                $em->persist($coach);
                $em->flush();
            }
         $p = 0;
            while($p++ < 5) {
                $player = new Player();
                $em = $this->getDoctrine()->getManager();
                $player->setName($faker->name);
                $player->setInfo($faker->text(2000));
                $player->setCountry($country->getName());
                $player->setTeam($team);
                $em->persist($player);
                $em->flush();
            }
        }
        }
        return $this->render("@App/Generator/generator.html.twig", array(
            "country" =>$country->getId(),
            "team" => $team->getId(),
            "coach" => $coach->getId(),
            "player" => $player->getId()
        ));
    }
}
