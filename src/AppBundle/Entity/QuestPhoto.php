<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * QuestPhoto
 *
 * @ORM\Table(name="quest_photo")
 * @ORM\Entity()
 */
class QuestPhoto
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
     * @var Media
     * @ORM\ManyToOne(
     *  targetEntity="Application\Sonata\MediaBundle\Entity\Media",
     *  cascade={"persist", "remove"}
     * )
     */
    private $image;

    /**
     * @ORM\ManyToOne(targetEntity="Quest", inversedBy="photos", cascade={"persist"})
     * @ORM\JoinColumn(name="quest_id", referencedColumnName="id")
     */
    private $quest;

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
     * Set image
     *
     * @param Media $image
     *
     * @return QuestPhoto
     */
    public function setImage(Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set quest
     *
     * @param Quest $quest
     *
     * @return QuestPhoto
     */
    public function setQuest(Quest $quest = null)
    {
        $this->quest = $quest;

        return $this;
    }

    /**
     * Get quest
     *
     * @return \AppBundle\Entity\Quest
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}
