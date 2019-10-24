<?php

namespace AppBundle\Controller;

use AppBundle\Entity\StaticText;
use AppBundle\Form\Type\OrderType;
use AppBundle\Entity\Order;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Response;

class MainController extends Controller
{
    /**
     * @Route("/", name="app__main__index")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/about", name="app__main__about")
     */
    public function aboutAction()
    {
        $about = $this->getDoctrine()->getRepository('AppBundle:StaticText')->findOneBy([
            'type' => StaticText::TYPE_ABOUT,
        ]);

        $teammates = $this->getDoctrine()
            ->getRepository('AppBundle:Teammate')
            ->findBy(['isActive' => true], ['sortOrder' => 'ASC']);
        $clients = $this->getDoctrine()
            ->getRepository('AppBundle:Client')
            ->findBy(['isActive' => true], [
                'row' => 'ASC',
                'sortOrder' => 'ASC',
            ]);

        return $this->render('default/about.html.twig', [
            'about' => $about,
            'teammates' => $teammates,
            'clients' => $clients,
        ]);
    }

    /**
     * @param Project|null $project
     *
     * @return Response
     */
    public function sliderAction(Project $project = null)
    {
        $condition = [
            'isInSlider' => true,
        ];
        /** @var Project $projects */
        $projects = $this->getDoctrine()
            ->getRepository('AppBundle:Project')
            ->findBy($condition, ['sortOrder' => 'ASC']);

        $renderOpts = [
            'projects' => $projects,
        ];
        if (null !== $project) {
            $renderOpts['current_project'] = $project;
        }

        return $this->render('default/_slider.html.twig', $renderOpts);
    }

    /**
     * @return Response
     */
    public function footerProjectsAction()
    {
        $projects = $this->getDoctrine()
            ->getRepository('AppBundle:Project')
            ->findBy(['isActive' => true], ['sortOrder' => 'ASC']);

        return $this->render('default/_footer_projects.html.twig', [
            'projects' => $projects,
        ]);
    }
}
