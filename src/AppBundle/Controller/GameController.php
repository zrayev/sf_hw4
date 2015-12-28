<?php

namespace AppBundle\Controller;

use AppBundle\Form\GameType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Game;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GameController extends Controller
{
    /**
     * @return Response
     * @internal param Request $request
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
        'pagination' => $pagination,
         ]);
    }

    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(GameType::class);
        $form->add('save', SubmitType::class, array('label' => 'Save'));
        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $game = $form->getData();
                $em->persist($game);
                $em->flush();

                return $this->redirectToRoute('game');
            }
        }
        return $this->render('AppBundle:Games:create.html.twig', [
        'form' => $form->createView()
        ]);
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em
            ->getRepository('AppBundle:Game')
            ->find($id);

        if (!$game) {
            throw $this->createNotFoundException(
                'No game found for name ' . $id
            );
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(GameType::class, $game);
        $form->add('save', SubmitType::class, array('label' => 'Edit'));
        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->flush();

                return $this->redirectToRoute('game');
            }
        }
        return $this->render('AppBundle:Games:edit.html.twig', [
        'form' => $form->createView()
        ]);
    }

    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em
            ->getRepository('AppBundle:Game')
            ->find($id);

        if (!$game) {
            throw $this->createNotFoundException(
                'No game found for name ' . $id
            );
        }

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(GameType::class, $game);
        $form->add('save', SubmitType::class, array('label' => 'Delete'));
        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em->remove($game);
                $em->flush();

                return $this->redirectToRoute('game');
            }
        }
        return $this->render('AppBundle:Games:delete.html.twig', [
        'form' => $form->createView()
        ]);
    }
}
