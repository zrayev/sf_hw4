<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller

{

    /**
     * @return Response
     */
    public function indexAction()
    {
        $countries = $this->getDoctrine()
            ->getRepository('AppBundle:Country')
            ->findAll();

        return $this->render('AppBundle:Default:index.html.twig', [
            'countries' =>$countries,
        ]);
    }
}
