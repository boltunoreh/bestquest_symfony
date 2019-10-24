<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\OrderType;
use AppBundle\Entity\Order;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Response;

class ProjectController extends Controller
{
    /**
     * @Route("/project/{slug}", name="app__project__show")
     * @param Project $project
     *
     * @return Response
     */
    public function showAction(Project $project)
    {
        // convert HEX to rgb
        $color = implode(', ', array_map('hexdec', str_split(str_replace('#', '', $project->getColor()), 2)));
        $project->setColor($color);

        return $this->render('default/project.html.twig', [
            'current_project' => $project,
        ]);
    }
}
