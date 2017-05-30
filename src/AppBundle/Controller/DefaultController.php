<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Order;
use AppBundle\Form\OrderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Project;

class DefaultController extends Controller
{
    /**
     * @Route("/about", name="app__about")
     */
    public function aboutAction()
    {
        $teammates = $this->getDoctrine()->getRepository('AppBundle:Teammate')->findBy(
            array(
                'isActive' => true,
            ),
            array(
                'sortOrder' => 'ASC',
            )
        );
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findBy(
            array(
                'isActive' => true,
            ),
            array(
                'sortOrder' => 'ASC',
            )
        );

        return $this->render('default/about.html.twig', array(
            'teammates' => $teammates,
            'clients'   => $clients,
        ));
    }

    /**
     * @Route("/", name="app__homepage")
     */
    public function indexAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy(array(
            'isActive'   => true,
            'isInSlider' => true,
        ));

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

        return $this->render('default/index.html.twig', array(
            'projects'   => $projects,
            'categories' => $categories,
        ));
    }

    /**
     * @Route("/project/exclusive", name="app__exclusive")
     */
    public function exclusiveAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy(array(
            'isActive'   => true,
        ));

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

        return $this->render('default/project_exclusive.html.twig', array(
            'projects'   => $projects,
            'categories' => $categories,
        ));
    }

    /**
     * @Route("/project/{slug}", name="app__project")
     */
    public function projectAction(Project $project)
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy(array(
            'isActive' => true,
        ));

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

        $form = $this->createForm(OrderType::class);

        return $this->render('default/project.html.twig', array(
            'project'    => $project,
            'projects'   => $projects,
            'categories' => $categories,
            'order_form' => $form,
        ));
    }
}
