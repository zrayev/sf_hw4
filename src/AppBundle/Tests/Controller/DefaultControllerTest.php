<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');
        $this->assertTrue($client->getResponse()->isSuccessful());
        $this->assertTrue($crawler->filter('a:contains("England")')->count() == 1);
    }

    public function testCountry()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'country/en');
        $this->assertCount(1, $crawler->filter('h2'));
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function testPlayer()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'player/en/1');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

     public function testTeam()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'team/en');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }

      public function testCoach()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'coach/en');
        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}
