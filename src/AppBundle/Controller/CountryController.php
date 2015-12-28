<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\Country;

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
            ->find($id);

        if (!$country) {
            throw $this->createNotFoundException(
                'No country found for name ' . $id
            );
        }

        return $this->render('AppBundle:Country:country.html.twig', [
            'country' => $country
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(CountryType::class);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

        if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $country = $form->getData();
                $em->persist($country);
                $em->flush();

                return $this->redirectToRoute('index');
            }
        }

        return $this->render('AppBundle:Country:create.html.twig', [
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
       $country = $em
            ->getRepository('AppBundle:Country')
            ->find($id);

        if (!$country) {
            throw $this->createNotFoundException(
                'No country found for name ' . $id
            );
        }

        $form = $this->createForm(CountryType::class, $country);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

         if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $this->redirectToRoute('index');
            }
        }

        return $this->render('AppBundle:Country:edit.html.twig', [
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
        $country = $em
            ->getRepository('AppBundle:Country')
            ->find($id);

        if (!$country) {
            throw $this->createNotFoundException(
                'No country found for name ' . $id
            );
        }

        $form = $this->createForm(CountryType::class, $country);
        $form->add('save', SubmitType::class, array('label' => 'Save'));

         if ($request->getMethod() === 'POST') {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->remove($country);
                $em->flush();

                return $this->redirectToRoute('index');
            }
        }

        return $this->render('AppBundle:Country:delete.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
