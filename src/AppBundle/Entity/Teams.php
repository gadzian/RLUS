<?php
/**
 * Created by PhpStorm.
 * User: adzy
 * Date: 04.09.2017
 * Time: 09:46
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="teams")
 */
class Teams
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     */
    protected $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $name;
    /**
     * @ORM\Column(type="integer")
     */
    protected $matches;
    /**
     * @ORM\Column(type="integer")
     */
    protected $won;
    /**
     * @ORM\Column(type="integer")
     */
    protected $otwon;
    /**
     * @ORM\Column(type="integer")
     */
    protected $otlost;
    /**
     * @ORM\Column(type="integer")
     */
    protected $lost;
    /**
     * @ORM\Column(type="integer")
     */
    protected $goals;
    /**
     * @ORM\Column(type="integer")
     */
    protected $goalsagainst;
    /**
     * @ORM\Column(type="integer")
     */
    protected $points;
    /**
     * @ORM\Column(type="integer", default = 0)
     */






    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Teams
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
     * Set name
     *
     * @param string $name
     *
     * @return Teams
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

    /**
     * Set matches
     *
     * @param integer $matches
     *
     * @return Teams
     */
    public function setMatches($matches)
    {
        $this->matches = $matches;

        return $this;
    }

    /**
     * Get matches
     *
     * @return integer
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Set won
     *
     * @param integer $won
     *
     * @return Teams
     */
    public function setWon($won)
    {
        $this->won = $won;

        return $this;
    }

    /**
     * Get won
     *
     * @return integer
     */
    public function getWon()
    {
        return $this->won;
    }

    /**
     * Set otwon
     *
     * @param integer $otwon
     *
     * @return Teams
     */
    public function setOtwon($otwon)
    {
        $this->otwon = $otwon;

        return $this;
    }

    /**
     * Get otwon
     *
     * @return integer
     */
    public function getOtwon()
    {
        return $this->otwon;
    }

    /**
     * Set otlost
     *
     * @param integer $otlost
     *
     * @return Teams
     */
    public function setOtlost($otlost)
    {
        $this->otlost = $otlost;

        return $this;
    }

    /**
     * Get otlost
     *
     * @return integer
     */
    public function getOtlost()
    {
        return $this->otlost;
    }

    /**
     * Set lost
     *
     * @param integer $lost
     *
     * @return Teams
     */
    public function setLost($lost)
    {
        $this->lost = $lost;

        return $this;
    }

    /**
     * Get lost
     *
     * @return integer
     */
    public function getLost()
    {
        return $this->lost;
    }

    /**
     * Set goals
     *
     * @param integer $goals
     *
     * @return Teams
     */
    public function setGoals($goals)
    {
        $this->goals = $goals;

        return $this;
    }

    /**
     * Get goals
     *
     * @return integer
     */
    public function getGoals()
    {
        return $this->goals;
    }

    /**
     * Set goalsagainst
     *
     * @param integer $goalsagainst
     *
     * @return Teams
     */
    public function setGoalsagainst($goalsagainst)
    {
        $this->goalsagainst = $goalsagainst;

        return $this;
    }

    /**
     * Get goalsagainst
     *
     * @return integer
     */
    public function getGoalsagainst()
    {
        return $this->goalsagainst;
    }

    /**
     * Set points
     *
     * @param integer $points
     *
     * @return Teams
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer
     */
    public function getPoints()
    {
        return $this->points;
    }
}
