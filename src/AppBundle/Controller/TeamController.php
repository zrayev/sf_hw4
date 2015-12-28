<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Player;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Coach;
use AppBundle\Form\CoachType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class TeamController extends Controller
{

    /**
     * @return Response
     * @internal param $name
     */
    public function indexAction($id, Request $request)
    {
        $coach = new Coach();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CoachType::class,$coach);
        $form->add('save', SubmitType::class, array('label' => 'Save'));
        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){
                $em->persist($coach);
                $em->flush();
            }
        }
        $doctrine  = $this->getDoctrine();
        $team = $doctrine
            ->getRepository('AppBundle:Team')
            ->find($id);

        if (!$team) {
            throw $this->createNotFoundException(
                'No team found for id '.$id
            );
        }

             return $this->render('AppBundle:Team:team.html.twig', [
                 'team' => $team,
                 'form' =>$form->createView(),
              ]);
    }
}

