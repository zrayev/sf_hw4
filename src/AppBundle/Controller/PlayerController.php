<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PlayerController extends Controller

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
     * @param $country
     * @param $id
     * @return Response
     */
    public function indexAction($country, $id)
    {
        if (!isset($this->teamsData[$country]['players'][$id])) {
            throw $this->createNotFoundException('The player does not exist');
        }

        return $this->render('AppBundle:Player:player.html.twig',[
            'player' => $this->teamsData[$country]['players'][$id],


        ]);
    }
}
