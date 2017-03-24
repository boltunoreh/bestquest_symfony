<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Quest
 *
 * @ORM\Table(name="quest")
 * @ORM\Entity()
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", length=128, unique=true, nullable=false)
     */
    private $slug;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

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
    /**
     * @ORM\ManyToMany(targetEntity="Category")
     * @ORM\JoinTable(name="quest_categories",
     *      joinColumns={@ORM\JoinColumn(name="quest_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     */
    private $categories;

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
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $sliderSmallImage;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $sliderLargeImage;

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
     * @ORM\OneToMany(targetEntity="QuestPhoto", mappedBy="quest", cascade={"persist", "remove"},
     *     orphanRemoval=true)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $headerBackgroundImage;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $descriptionBackgroundImage;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $stripeBackgroundImage;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $formBackgroundImage;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255)
     */
    private $icon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->categories = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     *
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
     *
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
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Quest
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isInSlider
     *
     * @param boolean $isInSlider
     *
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
     * Set sliderAnnotation
     *
     * @param string $sliderAnnotation
     *
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
     *
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
     * Set description
     *
     * @param string $description
     *
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
     *
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
     * Set color
     *
     * @param string $color
     *
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
     * Set icon
     *
     * @param string $icon
     *
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

    /**
     * Add category
     *
     * @param Category $category
     *
     * @return Quest
     */
    public function addCategory(Category $category)
    {
        $this->categories->add($category);

        return $this;
    }

    /**
     * Remove category
     *
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set sliderSmallImage
     *
     * @param Media $sliderSmallImage
     *
     * @return Quest
     */
    public function setSliderSmallImage(Media $sliderSmallImage = null)
    {
        $this->sliderSmallImage = $sliderSmallImage;

        return $this;
    }

    /**
     * Get sliderSmallImage
     *
     * @return Media
     */
    public function getSliderSmallImage()
    {
        return $this->sliderSmallImage;
    }

    /**
     * Set sliderLargeImage
     *
     * @param Media $sliderLargeImage
     *
     * @return Quest
     */
    public function setSliderLargeImage(Media $sliderLargeImage = null)
    {
        $this->sliderLargeImage = $sliderLargeImage;

        return $this;
    }

    /**
     * Get sliderLargeImage
     *
     * @return Media
     */
    public function getSliderLargeImage()
    {
        return $this->sliderLargeImage;
    }

    /**
     * Add photo
     *
     * @param QuestPhoto $photo
     *
     * @return Quest
     */
    public function addPhoto(QuestPhoto $photo)
    {
        $photo->setQuest($this);
        $this->photos->add($photo);

        return $this;
    }

    /**
     * Remove photo
     *
     * @param QuestPhoto $photo
     */
    public function removePhoto(QuestPhoto $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * @param mixed $photos
     * @return $this
     */
    public function setPhotos($photos)
    {
        $this->photos = new ArrayCollection();
        /** @var QuestPhoto $photo */
        foreach ($photos as $photo) {
            $photo->setQuest($this);
            $this->addPhoto($photo);
        }

        return $this;
    }

    /**
     * Set headerBackgroundImage
     *
     * @param Media $headerBackgroundImage
     *
     * @return Quest
     */
    public function setHeaderBackgroundImage(Media $headerBackgroundImage = null)
    {
        $this->headerBackgroundImage = $headerBackgroundImage;

        return $this;
    }

    /**
     * Get headerBackgroundImage
     *
     * @return Media
     */
    public function getHeaderBackgroundImage()
    {
        return $this->headerBackgroundImage;
    }/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

    /**
     * Set descriptionBackgroundImage
     *
     * @param Media $descriptionBackgroundImage
     *
     * @return Quest
     */
    public function setDescriptionBackgroundImage(Media $descriptionBackgroundImage = null)
    {
        $this->descriptionBackgroundImage = $descriptionBackgroundImage;

        return $this;
    }

    /**
     * Get descriptionBackgroundImage
     *
     * @return Media
     */
    public function getDescriptionBackgroundImage()
    {
        return $this->descriptionBackgroundImage;
    }

    /**
     * Set stripeBackgroundImage
     *
     * @param Media $stripeBackgroundImage
     *
     * @return Quest
     */
    public function setStripeBackgroundImage(Media $stripeBackgroundImage = null)
    {
        $this->stripeBackgroundImage = $stripeBackgroundImage;

        return $this;
    }

    /**
     * Get stripeBackgroundImage
     *
     * @return Media
     */
    public function getStripeBackgroundImage()
    {
        return $this->stripeBackgroundImage;
    }

    /**
     * Set formBackgroundImage
     *
     * @param Media $formBackgroundImage
     *
     * @return Quest
     */
    public function setFormBackgroundImage(Media $formBackgroundImage = null)
    {
        $this->formBackgroundImage = $formBackgroundImage;

        return $this;
    }

    /**
     * Get formBackgroundImage
     *
     * @return Media
     */
    public function getFormBackgroundImage()
    {
        return $this->formBackgroundImage;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->title;
    }
}
