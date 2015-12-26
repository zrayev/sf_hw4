<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Game;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GameController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $game = new Game();

        $form = $this->createFormBuilder($game)
            ->add('score', TextType::class)
            ->add('date',DateType::class)
            ->add('save',SubmitType::class, array('label' => 'Create Task'))
            ->getForm();


//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//
//        return $this->redirectToRoute('success');
//        }


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $this->getDoctrine()->getRepository('AppBundle:Game')->findAllQuery(), /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        10/*limit per page*/
    );

         return $this->render('AppBundle:Games:games.html.twig', [
        'pagination' => $pagination,
        'form' => $form->createView()
         ]);
    }
}
