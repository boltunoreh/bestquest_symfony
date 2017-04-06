<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Project;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="app__homepage")
     */
    public function indexAction(Request $request)
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
        return $this->render('default/exclusive.html.twig', array(
        ));
    }

    /**
     * @Route("/project/{slug}", name="app__project")
     */
    public function projectAction(Project $project)
    {
        return $this->render('default/project.html.twig', array(
            'project' => $project,
        ));
    }

    /**
     * @Route("/about", name="app__about")
     */
    public function aboutAction()
    {
        $teammates = $this->getDoctrine()->getRepository('AppBundle:Teammate')->findBy(array(
            'isActive' => true,
        ));
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findBy(array(
            'isActive' => true,
        ));

        return $this->render('default/about.html.twig', array(
            'teammates' => $teammates,
            'clients'   => $clients,
        ));
    }
}
