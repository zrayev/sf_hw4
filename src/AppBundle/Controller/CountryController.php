<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller

{
    /**
     * @param $id
     * @return Response
     */
    public function indexAction($id)
    {
        $country = $this->getDoctrine()
            ->getRepository('AppBundle:Country')
            ->find($id)
        ;

        if (!$country) {
            throw $this->createNotFoundException(
                'No country found for name '.$id
            );
        }
             return $this->render('AppBundle:Country:country.html.twig', [
            'country' =>$country
              ]);
    }
}
