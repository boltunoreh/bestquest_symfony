<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\OrderType;
use AppBundle\Entity\Order;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Project;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="app__homepage")
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/project/{slug}", name="app__project")
     * @param Project $project
     * @return Response
     */
    public function projectAction(Project $project)
    {
        $reviews = $this->getDoctrine()->getRepository('AppBundle:Review')
            ->findBy([
                'isActive' => true,
                'project' => $project,
            ]);
        return $this->render('default/project.html.twig', [
            'current_project' => $project,
            'reviews' => $reviews,
        ]);
    }

    /**
     * @Route("/about", name="app__about")
     */
    public function aboutAction()
    {
        $about = $this->getDoctrine()->getRepository('AppBundle:About')->findOneBy([]);

        $teammates = $this->getDoctrine()->getRepository('AppBundle:Teammate')->findBy(
            [
                'isActive' => true,
            ],
            [
                'sortOrder' => 'ASC',
            ]
        );
        $clients = $this->getDoctrine()->getRepository('AppBundle:Client')->findBy(
            [
                'isActive' => true,
            ],
            [
                'row'       => 'ASC',
                'sortOrder' => 'ASC',
            ]
        );

        return $this->render('default/about.html.twig', [
            'about'     => $about,
            'teammates' => $teammates,
            'clients'   => $clients,
        ]);
    }

    /**
     * @Route("/project/exclusive", name="app__exclusive")
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     */
    public function exclusiveAction(Request $request)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderData = $form->getData();

            $order = new Order();
            $order->setName($orderData['name']);
            $order->setEmail($orderData['email']);
            $order->setPhone($orderData['phone']);
            $order->setMembers($orderData['members']);
            $order->setDate(new \DateTime($orderData['date']));
            $order->setGoal($orderData['goal']);
            $order->setFieldOfActivity($orderData['fieldOfActivity']);
            $order->setAverageAge($orderData['averageAge']);
            $order->setLikedProjects($orderData['likedProjects']);
            $order->setDislikedProjects($orderData['dislikedProjects']);
            $order->setIdeas($orderData['ideas']);

            $em = $this->getDoctrine()->getManager();

            $em->persist($order);
            $em->flush();

            $message = new \Swift_Message();
            $message
                ->setFrom($this->getParameter('no_reply_email'))
                ->setTo($this->getParameter('admin_email'))
                ->setSubject('Заявка с сайта')
                ->setBody(
                    $this->renderView(
                        'Emails/exclusive_order.html.twig',
                        [
                            'order' => $order,
                        ]
                    ),
                    'text/html'
                )
            ;

            $this->get('mailer')->send($message);

            if (true == $orderData['copyMe']) {
                $messageCopy = new \Swift_Message();
                $messageCopy
                    ->setFrom($this->getParameter('no_reply_email'))
                    ->setTo($orderData['email'])
                    ->setSubject('Заявка на сайте best-quest.ru')
                    ->setBody(
                        $this->renderView(
                            'Emails/exclusive_order.html.twig',
                            [
                                'order' => $order,
                                'copy'  => true,
                            ]
                        ),
                        'text/html'
                    )
                ;

                $this->get('mailer')->send($messageCopy);
            }

            return $this->redirectToRoute('order_success');
        }

        return $this->render('default/project_exclusive.html.twig', [
            'order_form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/order/{slug}", name="app__order", defaults={"slug": null})
     * @param Request $request
     * @param Project $project
     * @return Response
     * @throws \Exception
     */
    public function orderAction(Request $request, Project $project = null)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $orderData = $form->getData();

            $order = new Order();
            $order->setName($orderData['name']);
            $order->setEmail($orderData['email']);
            $order->setPhone($orderData['phone']);
            $order->setMembers($orderData['members']);
            $order->setDate(new \DateTime($orderData['date']));
            $order->setDescription($orderData['description']);

            $em = $this->getDoctrine()->getManager();

            $em->persist($order);
            $em->flush();

            $message = new \Swift_Message();
            $message
                ->setFrom($this->getParameter('no_reply_email'))
                ->setTo($this->getParameter('admin_email'))
                ->setSubject('Заявка с сайта')
                ->setBody(
                    $this->renderView(
                        'Emails/order.html.twig',
                        [
                            'order' => $order,
                        ]
                    ),
                    'text/html'
                )
            ;

            $this->get('mailer')->send($message);

            if (true == $orderData['copyMe']) {
                $messageCopy = new \Swift_Message();
                $messageCopy
                    ->setFrom($this->getParameter('no_reply_email'))
                    ->setTo($orderData['email'])
                    ->setSubject('Заявка на сайте best-quest.ru')
                    ->setBody(
                        $this->renderView(
                            'Emails/order.html.twig',
                            [
                                'order' => $order,
                                'copy'  => true,
                            ]
                        ),
                        'text/html'
                    )
                ;

                $this->get('mailer')->send($messageCopy);
            }

            return $this->render('default/order_success.html.twig', [
            ]);
        }

        $renderOpts = [
            'order_form' => $form->createView(),
        ];
        if (null !== $project) {
            $renderOpts['current_project'] = $project;
        }

        return $this->render('default/order.html.twig', $renderOpts);
    }

    /**
     * @param string $route
     * @param Project|null $project
     * @return Response
     */
    public function sliderAction($route, Project $project = null)
    {
        $condition = [
            'isActive' => true,
        ];
        if ('app__homepage' === $route) {
            $condition['isInSlider'] = true;
        }
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy($condition);

        $renderOpts = [
            'projects' => $projects,
        ];
        if (null !== $project) {
            $renderOpts['current_project'] = $project;
        }

        return $this->render('default/_slider.html.twig', $renderOpts);
    }

    /**
     * @param string $route
     * @param Project|null $project
     * @return Response
     */
    public function sliderIconsAction($route, Project $project = null)
    {
        $condition = [
            'isActive' => true,
        ];
        if ('app__homepage' === $route) {
            $condition['isInSlider'] = true;
        }
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy($condition);

        $renderOpts = [
            'projects' => $projects,
        ];
        if (null !== $project) {
            $renderOpts['current_project'] = $project;
        }

        return $this->render('default/_slider_icons.html.twig', $renderOpts);
    }

    /**
     * @return Response
     */
    public function footerProjectsAction()
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy([
            'isActive' => true,
        ]);

        return $this->render('default/_footer_projects.html.twig', [
            'projects' => $projects,
        ]);
    }
}
