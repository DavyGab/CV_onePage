<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * experience
 *
 * @ORM\Table(name="resume_davy_experience")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\experienceRepository")
 */
class Experience
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
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status = true;

    /**
     * @var string
     *
     * @ORM\Column(name="start_date", type="string", length=30)
     */
    private $startDate;

    /**
     * @var string
     *
     * @ORM\Column(name="end_date", type="string", length=30)
     */
    private $endDate;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_title", type="string", length=100)
     */
    private $subTitle;

    /**
     * @var int
     *
     * @ORM\Column(name="category", type="smallint")
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="sub_category", type="string", length=255, nullable=true)
     */
    private $subCategory;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=50, nullable=true)
     */
    private $localisation;

    /**
     * @var int
     *
     * @ORM\Column(name="order_display", type="smallint", nullable=true)
     */
    private $order;

    /*
     * Copie de l'id, utile pour envoyer l'id des entités en ajax
     */
    private $idTemp = -1;

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
     * Set startDate
     *
     * @param string $startDate
     * @return experience
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return string 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param string $endDate
     * @return experience
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return string 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return experience
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return experience
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set subCategory
     *
     * @param integer $subCategory
     * @return experience
     */
    public function setSubCategory($subCategory)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory
     *
     * @return integer 
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }

    /**
     * Set subTitle
     *
     * @param string $subTitle
     * @return experience
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle
     *
     * @return string 
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return experience
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return experience
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     * @return experience
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string 
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdTemp()
    {
        return $this->id != null ? $this->id : -1;
    }

    /**
     * @param mixed $idTemp
     */
    public function setIdTemp($idTemp)
    {
        $this->idTemp = $idTemp;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }
}
