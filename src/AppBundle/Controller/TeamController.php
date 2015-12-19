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
        $doctrine  = $this->getDoctrine();
        $team = $doctrine
            ->getRepository('AppBundle:Team')
            ->findOneBy(
            array('country' => $name)
            );

        if (!$team) {
            throw $this->createNotFoundException(
                'No team found for name '.$name
            );
        }

             return $this->render('AppBundle:Team:team.html.twig', [
                 'team' => $team,
              ]);
    }
}

