<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Project
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity()
 */
class Project
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
     * @ORM\Column(name="title", type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(name="slug", type="string", unique=true, nullable=false)
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
     * @ORM\Column(name="slider_annotation", type="string")
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
     * @ORM\Column(name="video_id", type="text", nullable=true)
     */
    private $videoId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="members", type="string")
     */
    private $members;

    /**
     * @var string
     *
     * @ORM\Column(name="place", type="string")
     */
    private $place;

    /**
     * @var string
     *
     * @ORM\Column(name="movement_type", type="string")
     */
    private $movementType;

    /**
     * @var string
     *
     * @ORM\Column(name="duration", type="string")
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="gadget", type="string")
     */
    private $gadget;

    /**
     * @var string
     *
     * @ORM\Column(name="age", type="string")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="Stage", cascade={"persist"})
     * @ORM\JoinTable(name="projects_stages",
     *      joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="stage_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $stages;

    /**
     * @ORM\OneToMany(targetEntity="ProjectPhoto", mappedBy="project", cascade={"persist", "remove"},
     *     orphanRemoval=true)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=7, nullable=true)
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
     * @var Review
     * @ORM\OneToMany(targetEntity="Review", mappedBy="project", cascade={"persist"})
     */
    private $reviews;

    /**
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $formBackgroundImage;

    /**
     * @var int
     *
     * @ORM\Column(name="sort_order", type="integer", nullable=true)
     */
    private $sortOrder;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="text")
     */
    private $icon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos     = new ArrayCollection();
        $this->stages     = new ArrayCollection();
        $this->reviews    = new ArrayCollection();
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param string $members
     * @return $this
     */
    public function setMembers($members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     * @return $this
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMovementType()
    {
        return $this->movementType;
    }

    /**
     * @param mixed $movementType
     * @return $this
     */
    public function setMovementType($movementType)
    {
        $this->movementType = $movementType;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return string
     */
    public function getGadget()
    {
        return $this->gadget;
    }

    /**
     * @param string $gadget
     * @return $this
     */
    public function setGadget($gadget)
    {
        $this->gadget = $gadget;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     * @return $this
     */
    public function setAge($age)
    {
        $this->age = $age;

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
     * Set description
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return $this
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
     * Set sliderSmallImage
     *
     * @param Media $sliderSmallImage
     *
     * @return $this
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
     * @return $this
     */
    public function setSliderLargeImage(Media $sliderLargeImage = null)
    {
        $this->sliderLargeImage = $sliderLargeImage;

        return $this;
    }

    /**
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @param string $videoId
     * @return $this
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
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
     * @param ProjectPhoto $photo
     *
     * @return $this
     */
    public function addPhoto(ProjectPhoto $photo)
    {
        $photo->setProject($this);
        $this->photos->add($photo);

        return $this;
    }

    /**
     * Remove photo
     *
     * @param ProjectPhoto $photo
     */
    public function removePhoto(ProjectPhoto $photo)
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
        /** @var ProjectPhoto $photo */
        foreach ($photos as $photo) {
            $photo->setProject($this);
            $this->addPhoto($photo);
        }

        return $this;
    }

    /**
     * Set headerBackgroundImage
     *
     * @param Media $headerBackgroundImage
     *
     * @return $this
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
     * @return $this
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
     * @return $this
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
     * @return mixed
     */
    public function getReviews()
    {
        return $this->reviews;
    }

    /**
     * @param mixed $reviews
     * @return $this
     */
    public function setReviews($reviews)
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * Add review
     *
     * @param Review $review
     *
     * @return $this
     */
    public function addReview(Review $review)
    {
        $this->reviews->add($review);

        return $this;
    }

    /**
     * Remove review
     *
     * @param Review $review
     */
    public function removeReview(Review $review)
    {
        $this->reviews->removeElement($review);
    }

    /**
     * Set formBackgroundImage
     *
     * @param Media $formBackgroundImage
     *
     * @return $this
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
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * @param int $sortOrder
     * @return $this
     */
    public function setSortOrder($sortOrder)
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * @param mixed $stages
     * @return $this
     */
    public function setStages($stages)
    {
        $this->stages = $stages;

        return $this;
    }

    /**
     * Add stage
     *
     * @param Stage $stage
     *
     * @return $this
     */
    public function addStage(Stage $stage)
    {
        $this->stages->add($stage);

        return $this;
    }

    /**
     * Remove stage
     *
     * @param Stage $stage
     */
    public function removeStage(Stage $stage)
    {
        $this->stages->removeElement($stage);
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return $this
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->title;
    }
}
