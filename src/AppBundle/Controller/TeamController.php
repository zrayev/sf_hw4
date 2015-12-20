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
    public function indexAction($id)
    {
        $doctrine  = $this->getDoctrine();
        $team = $doctrine
            ->getRepository('AppBundle:Team')
            ->find($id);

        if (!$team) {
            throw $this->createNotFoundException(
                'No team found for id '.$id
            );
        }

             return $this->render('AppBundle:Team:team.html.twig', [
                 'team' => $team,
              ]);
    }
}

