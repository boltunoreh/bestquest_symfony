<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * About
 *
 * @ORM\Table(name="about")
 * @ORM\Entity()
 */
class About
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
     * @ORM\Column(name="title", type="text")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="left_column", type="text")
     */
    private $leftColumn;

    /**
     * @var string
     *
     * @ORM\Column(name="right_column", type="text")
     */
    private $rightColumn;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeftColumn()
    {
        return $this->leftColumn;
    }

    /**
     * @param string $leftColumn
     * @return $this
     */
    public function setLeftColumn($leftColumn)
    {
        $this->leftColumn = $leftColumn;
        return $this;
    }

    /**
     * @return string
     */
    public function getRightColumn()
    {
        return $this->rightColumn;
    }

    /**
     * @param string $rightColumn
     * @return $this
     */
    public function setRightColumn($rightColumn)
    {
        $this->rightColumn = $rightColumn;
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
