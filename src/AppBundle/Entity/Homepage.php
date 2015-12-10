<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Homepage
 *
 * @ORM\Table(name="homepage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HomepageRepository")
 */
class Homepage
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
     * @ORM\Column(name="countries", type="string", length=255)
     */
    private $countries;

    /**
     * @var binary
     *
     * @ORM\Column(name="img", type="binary")
     */
    private $img;


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
     * Set countries
     *
     * @param string $countries
     *
     * @return Homepage
     */
    public function setCountries($countries)
    {
        $this->countries = $countries;

        return $this;
    }

    /**
     * Get countries
     *
     * @return string
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * Set img
     *
     * @param binary $img
     *
     * @return Homepage
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return binary
     */
    public function getImg()
    {
        return $this->img;
    }
}

