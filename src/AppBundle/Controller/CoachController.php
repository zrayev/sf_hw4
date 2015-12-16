<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class CoachController extends Controller

{
    /**
     * @return Response
     */
    public function indexAction($id)
    {
        $coach = $this->getDoctrine()
            ->getRepository('AppBundle:Coach')
            ->findOneBy(
            array(
                'id' => $id
            ));
        if (!$coach) {
            throw $this->createNotFoundException(
                'No coach found for id '.$id
            );
        }
         return $this->render('AppBundle:Coach:coach.html.twig', [
            'coach' =>$coach
             ]);
    }
}
