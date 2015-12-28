<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
     * @var Country
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Country", inversedBy="team", cascade={"persist", "remove"})
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
     * @var Player[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="team", cascade={"persist", "remove"})
     */
    private $players;

        /**
     * @var Coach[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Coach", mappedBy="team", cascade={"persist", "remove"})
     */
    private $coaches;

    /**
     * @var Game[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Game", inversedBy="teams")
     */
    private $games;

    /**
     *
     */
    public function __construct()
    {
        $this->players = new ArrayCollection();
        $this->coaches = new ArrayCollection();
        $this->games = new ArrayCollection();
    }

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
     * Set country
     *
     * @param Country $country
     *
     * @return Team
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @param Player $value
     */
    public function addPlayer($value)
    {
        $this->players[] = $value;
    }

    /**
     * @param Player[] $value
     * @return $this
     */
    public function setPlayers($value)
    {
        $this->players = $value;

        return $this;
    }

    /**
     * @return Coach[]
     */
    public function getCoaches()
    {
        return $this->coaches;
    }

    /**
     * @param Coach $value
     */
    public function addCoach($value)
    {
        $this->coaches[] = $value;
    }

    /**
     * @param Coach[] $value
     * @return $this
     */
    public function setCoaches($value)
    {
        $this->coaches = $value;

        return $this;
    }

    /**
     * @return Game[]
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * @param Game[] $value
     * @return $this
     */
    public function setGames($value)
    {
        $this->games = $value;

        return $this;
    }

    /**
     * @param Game $value
     * @return $this
     */
    public function addGame($value)
    {
        $this->games[] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setInfo($value)
    {
        $this->info = $value;

        return $this;
    }

}

