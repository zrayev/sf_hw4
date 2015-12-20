<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{

    public function indexAction()
    {
        $games = $this->getDoctrine()
            ->getRepository('AppBundle:Game')
            ->findAll();

        if (!$games) {
            throw $this->createNotFoundException(
                'No found games'
            );
        }

             return $this->render('AppBundle:Games:games.html.twig', [
            'games' =>$games
             ]);
    }
}
