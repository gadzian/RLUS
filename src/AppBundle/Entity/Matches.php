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
     * @ORM\Column(type="string", length=100)
     */
    protected $away;
    /**
     * @ORM\Column(type="integer")
     */
    protected $homeG;
    /**
     * @ORM\Column(type="integer")
     */
    protected $awayG;
    /**
     * @ORM\Column(type="bool")
     */
    protected $ot;

}