<?php

namespace Ikerib\IkasiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ikerib\IkasiBundle\Util\Util;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Question
 *
 * @ORM\Table()
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="Ikerib\IkasiBundle\Entity\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @Vich\UploadableField(mapping="question_image", fileNameProperty="imageName")
     *
     * @var File $imageFile
     */
    protected $imageFile;

    /**
     * @ORM\Column(type="string", length=255, name="image_name", nullable=true)
     *
     * @var string $imageName
     */
    protected $imageName;

    /**
     * @ORM\ManyToOne(targetEntity="Puesto", inversedBy="questions")
     * @ORM\JoinColumn(name="puesto_id", referencedColumnName="id")
     */
    protected $puesto;


    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime();
    }

    public function __toString()
    {
        return $this->getQuestion();
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        if ($image) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }


    /**
     * Set question
     *
     * @param string $question
     * @return Question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        $this->slug = Util::getSlug($question);

        return $this;
    }

/**
********************************************************************************************************
********************************************************************************************************
********************************************************************************************************
*/



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
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Question
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Question
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Question
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Question
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }



    /**
     * Add puestos
     *
     * @param \Ikerib\IkasiBundle\Entity\Puesto $puestos
     * @return Question
     */
    public function addPuesto(\Ikerib\IkasiBundle\Entity\Puesto $puestos)
    {
        $this->puestos[] = $puestos;

        return $this;
    }

    /**
     * Remove puestos
     *
     * @param \Ikerib\IkasiBundle\Entity\Puesto $puestos
     */
    public function removePuesto(\Ikerib\IkasiBundle\Entity\Puesto $puestos)
    {
        $this->puestos->removeElement($puestos);
    }

    /**
     * Get puestos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPuestos()
    {
        return $this->puestos;
    }

    /**
     * Set puesto
     *
     * @param \Ikerib\IkasiBundle\Entity\Puesto $puesto
     * @return Question
     */
    public function setPuesto(\Ikerib\IkasiBundle\Entity\Puesto $puesto = null)
    {
        $this->puesto = $puesto;

        return $this;
    }

    /**
     * Get puesto
     *
     * @return \Ikerib\IkasiBundle\Entity\Puesto 
     */
    public function getPuesto()
    {
        return $this->puesto;
    }
}
