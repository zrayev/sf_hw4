<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\PlayerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Player;

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

    /**
     * @param Request $request
     * @return Response
     */
    public function searchAction(Request $request)
    {
        $name = $request->query->get('name');
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $this->getDoctrine()->getRepository('AppBundle:Player')->findByNameQuery($name), /* query NOT result */
        $request->query->getInt('page', 1)/*page number*/,
        5/*limit per page*/
        );

        return $this->render('AppBundle:Player:search.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(PlayerType::class);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $player = $form->getData();
                $em->persist($player);
                $em->flush();

            return $this->redirectToRoute('team', array('id' => $player->getTeam()->getId()));
            }
        }

        return $this->render('AppBundle:Player:create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function editAction($id, Request $request)
        {
        $em = $this->getDoctrine()->getManager();
        $player = $em
            ->getRepository('AppBundle:Player')
            ->find($id);

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for name ' . $id
            );
        }

        $form = $this->createForm(PlayerType::class, $player);
        $form->add('save', SubmitType::class, array('label' => 'Edit'));

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

        return $this->redirectToRoute('team', array('id' => $player->getTeam()->getId()));
        }
        }

        return $this->render('AppBundle:Player:edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $player = $em
            ->getRepository('AppBundle:Player')
            ->find($id);

        if (!$player) {
            throw $this->createNotFoundException(
                'No player found for name ' . $id
            );
        }

        $form = $this->createForm(PlayerType::class, $player);
        $form->add('save', SubmitType::class, array('label' => 'Delete'));

         if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->remove($player);
                $em->flush();

            return $this->redirectToRoute('team', array('id' => $player->getTeam()->getId()));
            }
        }

        return $this->render('AppBundle:Player:delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
