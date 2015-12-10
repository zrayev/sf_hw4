<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TeamRepository")
 */
class Team
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="players", type="string", length=255)
     */
    private $players;

    /**
     * @var string
     *
     * @ORM\Column(name="coaches", type="string", length=255)
     */
    private $coaches;

    /**
     * @var string
     *
     * @ORM\Column(name="country_game", type="string", length=255)
     */
    private $countryGame;

    /**
     * @var string
     *
     * @ORM\Column(name="score", type="string", length=255)
     */
    private $score;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set players
     *
     * @param string $players
     *
     * @return Team
     */
    public function setPlayers($players)
    {
        $this->players = $players;

        return $this;
    }

    /**
     * Get players
     *
     * @return string
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set coaches
     *
     * @param string $coaches
     *
     * @return Team
     */
    public function setCoaches($coaches)
    {
        $this->coaches = $coaches;

        return $this;
    }

    /**
     * Get coaches
     *
     * @return string
     */
    public function getCoaches()
    {
        return $this->coaches;
    }

    /**
     * Set countryGame
     *
     * @param string $countryGame
     *
     * @return Team
     */
    public function setCountryGame($countryGame)
    {
        $this->countryGame = $countryGame;

        return $this;
    }

    /**
     * Get countryGame
     *
     * @return string
     */
    public function getCountryGame()
    {
        return $this->countryGame;
    }

    /**
     * Set score
     *
     * @param string $score
     *
     * @return Team
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Team
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

