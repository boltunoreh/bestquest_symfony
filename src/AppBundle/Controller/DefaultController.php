<?php

namespace AppBundle\Controller;

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
            'isActive' => true,
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
     * @Route("/project/{slug}", name="app__project")
     */
    public function projectAction($project)
    {
        return;
    }

    /**
     * @Route("/project/exclusive", name="app__exclusive")
     */
    public function exclusiveAction()
    {
        return;
    }

    /**
     * @Route("/about", name="app__about")
     */
    public function aboutAction()
    {
        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

        return $this->render('default/about.html.twig', array(
            'categories' => $categories,
        ));
    }
}
