<?php

namespace AppBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\ORM\Mapping as ORM;

/**
 * Order
 *
 * @ORM\Table(name="orders")
 * @ORM\Entity()
 */
class Order
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
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string")
     */
    private $phone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var int
     *
     * @ORM\Column(name="members", type="integer")
     */
    private $members;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="goal", type="string", nullable=true)
     */
    private $goal;

    /**
     * @var string
     *
     * @ORM\Column(name="field_of_activity", type="string", nullable=true)
     */
    private $fieldOfActivity;

    /**
     * @var string
     *
     * @ORM\Column(name="average_age", type="string", nullable=true)
     */
    private $averageAge;

    /**
     * @var string
     *
     * @ORM\Column(name="liked_projects", type="text", nullable=true)
     */
    private $likedProjects;

    /**
     * @var string
     *
     * @ORM\Column(name="disliked_projects", type="text", nullable=true)
     */
    private $unLikedProjects;

    /**
     * @var string
     *
     * @ORM\Column(name="ideas", type="text", nullable=true)
     */
    private $ideas;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return int
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param int $members
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param string $goal
     * @return Order
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
        return $this;
    }

    /**
     * @return string
     */
    public function getFieldOfActivity()
    {
        return $this->fieldOfActivity;
    }

    /**
     * @param string $fieldOfActivity
     * @return Order
     */
    public function setFieldOfActivity($fieldOfActivity)
    {
        $this->fieldOfActivity = $fieldOfActivity;
        return $this;
    }

    /**
     * @return string
     */
    public function getAverageAge()
    {
        return $this->averageAge;
    }

    /**
     * @param string $averageAge
     * @return Order
     */
    public function setAverageAge($averageAge)
    {
        $this->averageAge = $averageAge;
        return $this;
    }

    /**
     * @return string
     */
    public function getLikedProjects()
    {
        return $this->likedProjects;
    }

    /**
     * @param string $likedProjects
     * @return Order
     */
    public function setLikedProjects($likedProjects)
    {
        $this->likedProjects = $likedProjects;
        return $this;
    }

    /**
     * @return string
     */
    public function getDislikedProjects()
    {
        return $this->unLikedProjects;
    }

    /**
     * @param string $unLikedProjects
     * @return Order
     */
    public function setDislikedProjects($unLikedProjects)
    {
        $this->unLikedProjects = $unLikedProjects;
        return $this;
    }

    /**
     * @return string
     */
    public function getIdeas()
    {
        return $this->ideas;
    }

    /**
     * @param string $ideas
     * @return Order
     */
    public function setIdeas($ideas)
    {
        $this->ideas = $ideas;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }
}
