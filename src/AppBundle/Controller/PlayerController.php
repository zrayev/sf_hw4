<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller
{
    /**
     * @return Response
     */
    public function indexAction($id)
    {
        $player = $this->getDoctrine()
            ->getRepository('AppBundle:Player')
            ->findOneBy(
            array(
                'id' => $id
            ));
             return $this->render('AppBundle:Player:player.html.twig', [
            'player' =>$player
             ]);
    }
}
