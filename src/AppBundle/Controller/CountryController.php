<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller

{
    /**
     * @return Response
     * @internal param $name
     */
    public function indexAction($name)
    {
        $country = $this->getDoctrine()
            ->getRepository('AppBundle:Country')
            ->findOneBy(
            array('name' => $name)
            );
        if (!$country) {
            throw $this->createNotFoundException(
                'No country found for name '.$name
            );
        }
             return $this->render('AppBundle:Country:country.html.twig', [
            'country' =>$country
              ]);
    }
}
