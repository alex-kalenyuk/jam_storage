<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * JamJar
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class JamJar
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\JamType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JamType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jam_type_id", referencedColumnName="id")
     * })
     */
    private $jamType;

    /**
     * @var \AppBundle\Entity\JamYear
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JamYear")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="jam_year_id", referencedColumnName="id")
     * })
     */
    private $jamYear;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;


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
     * Set comment
     *
     * @param string $comment
     * @return JamJar
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set jamType
     *
     * @param \AppBundle\Entity\JamType $jamType
     * @return JamJar
     */
    public function setJamType(\AppBundle\Entity\JamType $jamType = null)
    {
        $this->jamType = $jamType;

        return $this;
    }

    /**
     * Get jamType
     *
     * @return \AppBundle\Entity\JamType 
     */
    public function getJamType()
    {
        return $this->jamType;
    }

    /**
     * Set jamYear
     *
     * @param \AppBundle\Entity\JamYear $jamYear
     * @return JamJar
     */
    public function setJamYear(\AppBundle\Entity\JamYear $jamYear = null)
    {
        $this->jamYear = $jamYear;

        return $this;
    }

    /**
     * Get jamYear
     *
     * @return \AppBundle\Entity\JamYear 
     */
    public function getJamYear()
    {
        return $this->jamYear;
    }
}
