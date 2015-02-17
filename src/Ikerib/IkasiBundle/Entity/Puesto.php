<?php

namespace Ikerib\IkasiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Puesto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Ikerib\IkasiBundle\Entity\PuestoRepository")
 */
class Puesto
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="puesto", cascade={"ALL"})
     */
    private $questions;


    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
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
     * @return Puesto
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
     * Set slug
     *
     * @param string $slug
     * @return Puesto
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Add questions
     *
     * @param \Ikerib\IkasiBundle\Entity\Question $questions
     * @return Puesto
     */
    public function addQuestion(\Ikerib\IkasiBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \Ikerib\IkasiBundle\Entity\Question $questions
     */
    public function removeQuestion(\Ikerib\IkasiBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
