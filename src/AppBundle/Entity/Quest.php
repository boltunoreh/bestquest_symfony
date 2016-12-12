<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="quest")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestRepository")
 */
class Quest
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_in_slider", type="boolean")
     */
    private $isInSlider;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="slider_annotation", type="string", length=255)
     */
    private $sliderAnnotation;

    /**
     * @var string
     *
     * @ORM\Column(name="slider_description", type="text")
     */
    private $sliderDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="slider_image_small", type="string", length=255)
     */
    private $sliderImageSmall;

    /**
     * @var string
     *
     * @ORM\Column(name="slider_image_large", type="string", length=255)
     */
    private $sliderImageLarge;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="reglament", type="string", length=255)
     */
    private $reglament;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255)
     */
    private $photo;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_image_top", type="string", length=255)
     */
    private $bgImageTop;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_image_description", type="string", length=255)
     */
    private $bgImageDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_image_stripe", type="string", length=255)
     */
    private $bgImageStripe;

    /**
     * @var string
     *
     * @ORM\Column(name="bg_image_form", type="string", length=255)
     */
    private $bgImageForm;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

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
     * Set title
     *
     * @param string $title
     * @return Quest
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
     * Set slug
     *
     * @param string $slug
     * @return Quest
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
     * Set isInSlider
     *
     * @param boolean $isInSlider
     * @return Quest
     */
    public function setIsInSlider($isInSlider)
    {
        $this->isInSlider = $isInSlider;

        return $this;
    }

    /**
     * Get isInSlider
     *
     * @return boolean 
     */
    public function getIsInSlider()
    {
        return $this->isInSlider;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Quest
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set sliderAnnotation
     *
     * @param string $sliderAnnotation
     * @return Quest
     */
    public function setSliderAnnotation($sliderAnnotation)
    {
        $this->sliderAnnotation = $sliderAnnotation;

        return $this;
    }

    /**
     * Get sliderAnnotation
     *
     * @return string 
     */
    public function getSliderAnnotation()
    {
        return $this->sliderAnnotation;
    }

    /**
     * Set sliderDescription
     *
     * @param string $sliderDescription
     * @return Quest
     */
    public function setSliderDescription($sliderDescription)
    {
        $this->sliderDescription = $sliderDescription;

        return $this;
    }

    /**
     * Get sliderDescription
     *
     * @return string 
     */
    public function getSliderDescription()
    {
        return $this->sliderDescription;
    }

    /**
     * Set sliderImageSmall
     *
     * @param string $sliderImageSmall
     * @return Quest
     */
    public function setSliderImageSmall($sliderImageSmall)
    {
        $this->sliderImageSmall = $sliderImageSmall;

        return $this;
    }

    /**
     * Get sliderImageSmall
     *
     * @return string 
     */
    public function getSliderImageSmall()
    {
        return $this->sliderImageSmall;
    }

    /**
     * Set sliderImageLarge
     *
     * @param string $sliderImageLarge
     * @return Quest
     */
    public function setSliderImageLarge($sliderImageLarge)
    {
        $this->sliderImageLarge = $sliderImageLarge;

        return $this;
    }

    /**
     * Get sliderImageLarge
     *
     * @return string 
     */
    public function getSliderImageLarge()
    {
        return $this->sliderImageLarge;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Quest
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
     * Set reglament
     *
     * @param string $reglament
     * @return Quest
     */
    public function setReglament($reglament)
    {
        $this->reglament = $reglament;

        return $this;
    }

    /**
     * Get reglament
     *
     * @return string 
     */
    public function getReglament()
    {
        return $this->reglament;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Quest
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set color
     *
     * @param string $color
     * @return Quest
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set bgImageTop
     *
     * @param string $bgImageTop
     * @return Quest
     */
    public function setBgImageTop($bgImageTop)
    {
        $this->bgImageTop = $bgImageTop;

        return $this;
    }

    /**
     * Get bgImageTop
     *
     * @return string 
     */
    public function getBgImageTop()
    {
        return $this->bgImageTop;
    }

    /**
     * Set bgImageDescription
     *
     * @param string $bgImageDescription
     * @return Quest
     */
    public function setBgImageDescription($bgImageDescription)
    {
        $this->bgImageDescription = $bgImageDescription;

        return $this;
    }

    /**
     * Get bgImageDescription
     *
     * @return string 
     */
    public function getBgImageDescription()
    {
        return $this->bgImageDescription;
    }

    /**
     * Set bgImageStripe
     *
     * @param string $bgImageStripe
     * @return Quest
     */
    public function setBgImageStripe($bgImageStripe)
    {
        $this->bgImageStripe = $bgImageStripe;

        return $this;
    }

    /**
     * Get bgImageStripe
     *
     * @return string 
     */
    public function getBgImageStripe()
    {
        return $this->bgImageStripe;
    }

    /**
     * Set bgImageForm
     *
     * @param string $bgImageForm
     * @return Quest
     */
    public function setBgImageForm($bgImageForm)
    {
        $this->bgImageForm = $bgImageForm;

        return $this;
    }

    /**
     * Get bgImageForm
     *
     * @return string 
     */
    public function getBgImageForm()
    {
        return $this->bgImageForm;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Quest
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
