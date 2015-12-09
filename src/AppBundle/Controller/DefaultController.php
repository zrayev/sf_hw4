<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\IndexData;

class DefaultController extends Controller

{
    private $countriesData = [
        'England' => [
            'name' => 'England',
            'img'  => 'bundles/app/img/england.png'
        ],
        'France' => [
            'name' => 'France',
            'img' => 'bundles/app/img/france.png'
        ],
        'Albania' => [
            'name' => 'Albania',
            'img' => 'bundles/app/img/albania.png'
        ],
        'Austria' => [
            'name' => 'Austria',
            'img' => 'bundles/app/img/austria.png'
        ],
        'Belgium' => [
            'name' => 'Belgium',
            'img' => 'bundles/app/img/belgium.png'
        ],
        'Croatia' => [
            'name' => 'Croatia',
            'img' => 'bundles/app/img/croatia.png'
        ],
        'Czech' => [
            'name' => 'Czech',
            'img' => 'bundles/app/img/czech.png'
        ],
         'Germany' => [
            'name' => 'Germany',
            'img' => 'bundles/app/img/germany.png'
        ],
         'Hungary' => [
            'name' => 'Hungary',
            'img' => 'bundles/app/img/hungary.png'
        ],
         'Iceland' => [
            'name' => 'Iceland',
            'img' => 'bundles/app/img/iceland.png'
        ],
         'Ireland' => [
            'name' => 'Ireland',
            'img' => 'bundles/app/img/ireland.png'
        ],
         'Italy' => [
            'name' => 'Italy',
            'img' => 'bundles/app/img/italy.png'
        ],
         'Northern_Ireland' => [
            'name' => 'Northern Ireland',
            'img' => 'bundles/app/img/northern_ireland.png'
        ],
         'Poland' => [
            'name' => 'Poland',
            'img' => 'bundles/app/img/poland.png'
        ],
         'Portugal' => [
            'name' => 'Portugal',
            'img' => 'bundles/app/img/portugal.png'
        ],
         'Romania' => [
            'name' => 'Romania',
            'img' => 'bundles/app/img/romania.png'
        ],
         'Russia' => [
            'name' => 'Russia',
            'img' => 'bundles/app/img/russia.png'
        ],
         'Slovakia' => [
            'name' => 'Slovakia',
            'img' => 'bundles/app/img/slovakia.png'
        ],
         'Spain' => [
            'name' => 'Spain',
            'img' => 'bundles/app/img/spain.png'
        ],
         'Sweden' => [
            'name' => 'Sweden',
            'img' => 'bundles/app/img/sweden.png'
        ],
         'Switzerland' => [
            'name' => 'Switzerland',
            'img' => 'bundles/app/img/switzerland.png'
        ],
         'Turkey' => [
            'name' => 'Turkey',
            'img' => 'bundles/app/img/turkey.png'
        ],
         'Ukraine' => [
            'name' => 'Ukraine',
            'img' => 'bundles/app/img/ukraine.png'
        ],
         'Wales' => [
            'name' => 'Wales',
            'img' => 'bundles/app/img/wales.png'
        ],
    ];

    /**
     * @return Response
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig', [
            'countries' => $this->countriesData,
        ]);
    }
}
