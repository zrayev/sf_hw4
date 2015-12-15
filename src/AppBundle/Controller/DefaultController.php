<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('AppBundle:Country')->findAll();
       // return ['country' => $country];
        return $this->render('AppBundle:Default:index.html.twig', [
            'country' =>$country
        ]);
    }
}
