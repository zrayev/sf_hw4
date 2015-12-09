<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller

{
       private $teamsData = [
        'en' => [
            'name' => 'Team England',
            'code' => 'en',
            'players' => [
                1 => [
                    'name' => 'Vasia Petrov',
                    'text' => 'Best player team England'
                ],
                2 => [
                    'name' => 'Petro Pavlov',
                    'text' => 'Best player team England'
                ],
            ],
            'games' => [
                [
                    'name' => 'England - Ukraine',
                    'score' => '1:6',
                ],
            ],
            'coach' =>  [
                'name' => 'Vasia Petrov',
                'text' => 'Best coach team England',
            ],
        ],

        'fr' => [
            'name' => 'Team France',
            'code' => 'fr',
            'players' => [
                1 => [
                    'name' => 'Vasia Petrov'
                ],
                2 => [
                    'name' => 'Petro Pavlov'
                ],
            ],
            'games' => [
                [
                    'name' => 'France - Ukraine',
                    'score' => '1:6',
                ],
            ],
            'coach' =>  [
                'name' => 'Vasia Petrov',
                'text' => 'Best coach team France',
            ],
        ],


    ];

    /**
     * @param $name
     * @return Response
     */
    public function indexAction($name)
    {
        return $this->render('AppBundle:Team:team.html.twig', [
            'team' => $this->teamsData[$name],
        ]);
    }
}
