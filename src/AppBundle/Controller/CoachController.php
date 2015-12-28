<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CoachType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Coach;


class CoachController extends Controller
{
    /**
     * @param $id
     * @return Response
     */
    public function indexAction($id)
    {
        $coach = $this->getDoctrine()
            ->getRepository('AppBundle:Coach')
            ->find($id);

        if (!$coach) {
            throw $this->createNotFoundException(
                'No coach found for id '.$id
            );
        }

        return $this->render('AppBundle:Coach:coach.html.twig', [
            'coach' => $coach,
        ]);
    }

        /**
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CoachType::class);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $coach = $form->getData();
                $em->persist($coach);

                $em->flush();

        //    return $this->redirectToRoute('team', array('id' => $coach->getTeam()->getId()));
            }
        }

        return $this->render('AppBundle:Coach:create.html.twig', [
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
        $coach = $em
            ->getRepository('AppBundle:Coach')
            ->find($id);

        if (!$coach) {
            throw $this->createNotFoundException(
                'No coach found for name ' . $id
            );
        }

        $form = $this->createForm(CoachType::class, $coach);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

         if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

            return $this->redirectToRoute('team', array('id' => $coach->getTeam()->getId()));
            }
        }

        return $this->render('AppBundle:Coach:edit.html.twig', [
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
        $coach = $em
            ->getRepository('AppBundle:Country')
            ->find($id);

        if (!$coach) {
            throw $this->createNotFoundException(
                'No coach found for name ' . $id
            );
        }

        $form = $this->createForm(CoachType::class, $coach);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->remove($coach);
                $em->flush();

            return $this->redirectToRoute('team', array('id' => $coach->getTeam()->getId()));
            }
        }

        return $this->render('AppBundle:Coach:delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
