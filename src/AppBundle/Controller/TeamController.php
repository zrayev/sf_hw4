<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{

    /**
     * @return Response
     * @internal param $name
     */
    public function indexAction($name)
    {
        $team = $this->getDoctrine()
            ->getRepository('AppBundle:Team')
            ->findOneBy(
            array('country' => $name)
            );
        if (!$team) {
            throw $this->createNotFoundException(
                'No team found for name '.$name
            );
        }
        $players = $this->getDoctrine()
            ->getRepository('AppBundle:Player')
            ->findByCountry(
              array('country' => $name)
            );
        $coaches = $this->getDoctrine()
            ->getRepository('AppBundle:Coach')
            ->findByCountry(
              array('country' => $name)
            );
             return $this->render('AppBundle:Team:team.html.twig', [
                 'team' => $team,
                 'players' => $players,
                 'coaches' => $coaches
              ]);
    }
}

