<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
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

    public function searchAction(Request $request)
    {
        $name = $request->query->get('name');
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $this->getDoctrine()->getRepository('AppBundle:Player')->findByNameQuery($name), /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        5/*limit per page*/
        );

//        $name = $request->query->get('name');
//        $players = $this->getDoctrine()->getRepository('AppBundle:Player')->findByName($name);
//
        return $this->render('AppBundle:Player:search.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}
