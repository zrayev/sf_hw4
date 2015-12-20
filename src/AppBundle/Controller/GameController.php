<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class GameController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $this->getDoctrine()->getRepository('AppBundle:Game')->findAllQuery(), /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
    );


             return $this->render('AppBundle:Games:games.html.twig', [
            'pagination' => $pagination
             ]);
    }
}
