<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    /**
     * @param $id
     * @return Response
     */
    public function indexAction($id)
    {
        $player = $this->getDoctrine()
            ->getRepository('AppBundle:Player')
            ->find($id);

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for id '.$id
            );
        }

             return $this->render('AppBundle:Player:player.html.twig', [
            'player' =>$player
             ]);
    }
}
