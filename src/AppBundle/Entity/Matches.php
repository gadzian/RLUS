<?php
/**
 * Created by PhpStorm.
 * User: adzy
 * Date: 04.09.2017
 * Time: 12:37
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="matches")
 */
class Matches
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $matchday;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $home;
    /**
     * @ORM\Column(type="integer")
     */
    protected $homeID;
    /**
     * @ORM\Column(type="integer")
     */
    protected $homeG;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $away;
    /**
     * @ORM\Column(type="integer")
     */
    protected $awayID;
    /**
     * @ORM\Column(type="integer")
     */
    protected $awayG;
    /**
     * @ORM\Column(type="integer")
     */
    protected $ot;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Matches
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matchday
     *
     * @param integer $matchday
     *
     * @return Matches
     */
    public function setMatchday($matchday)
    {
        $this->matchday = $matchday;

        return $this;
    }

    /**
     * Get matchday
     *
     * @return integer
     */
    public function getMatchday()
    {
        return $this->matchday;
    }

    /**
     * Set home
     *
     * @param string $home
     *
     * @return Matches
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return string
     */
    public function getHome()
    {
        return $this->home;
    }

    /**
     * Set away
     *
     * @param string $away
     *
     * @return Matches
     */
    public function setAway($away)
    {
        $this->away = $away;

        return $this;
    }

    /**
     * Get away
     *
     * @return string
     */
    public function getAway()
    {
        return $this->away;
    }

    /**
     * Set homeG
     *
     * @param integer $homeG
     *
     * @return Matches
     */
    public function setHomeG($homeG)
    {
        $this->homeG = $homeG;

        return $this;
    }

    /**
     * Get homeG
     *
     * @return integer
     */
    public function getHomeG()
    {
        return $this->homeG;
    }

    /**
     * Set awayG
     *
     * @param integer $awayG
     *
     * @return Matches
     */
    public function setAwayG($awayG)
    {
        $this->awayG = $awayG;

        return $this;
    }

    /**
     * Get awayG
     *
     * @return integer
     */
    public function getAwayG()
    {
        return $this->awayG;
    }

    /**
     * Set ot
     *
     * @param integer $ot
     *
     * @return Matches
     */
    public function setOt($ot)
    {
        $this->ot = $ot;

        return $this;
    }

    /**
     * Get ot
     *
     * @return integer
     */
    public function getOt()
    {
        return $this->ot;
    }

    /**
     * Set homeID
     *
     * @param integer $homeID
     *
     * @return Matches
     */
    public function setHomeID($homeID)
    {
        $this->homeID = $homeID;

        return $this;
    }

    /**
     * Get homeID
     *
     * @return integer
     */
    public function getHomeID()
    {
        return $this->homeID;
    }

    /**
     * Set awayID
     *
     * @param integer $awayID
     *
     * @return Matches
     */
    public function setAwayID($awayID)
    {
        $this->awayID = $awayID;

        return $this;
    }

    /**
     * Get awayID
     *
     * @return integer
     */
    public function getAwayID()
    {
        return $this->awayID;
    }
}
