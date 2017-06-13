<?php

namespace AppBundle\Controller;

use AppBundle\Form\Type\OrderType;
use AppBundle\Entity\Order;
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
    public function exclusiveAction(Request $request)
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy(array(
            'isActive'   => true,
        ));

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

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
                        array(
                            'order' => $order,
                        )
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
                            array(
                                'order' => $order,
                                'copy'  => true,
                            )
                        ),
                        'text/html'
                    )
                ;

                $this->get('mailer')->send($messageCopy);
            }

            return $this->redirectToRoute('order_success');
        }

        return $this->render('default/project_exclusive.html.twig', array(
            'projects'   => $projects,
            'categories' => $categories,
            'order_form' => $form->createView(),
        ));
    }

    /**
     * @Route("/project/{slug}", name="app__project")
     */
    public function projectAction(Request $request, Project $project)
    {
        $projects = $this->getDoctrine()->getRepository('AppBundle:Project')->findBy(array(
            'isActive' => true,
        ));

        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findBy(array(
            'isActive' => true,
        ));

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
                        array(
                            'order' => $order,
                        )
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
                            array(
                                'order' => $order,
                                'copy'  => true,
                            )
                        ),
                        'text/html'
                    )
                ;

                $this->get('mailer')->send($messageCopy);
            }

            return $this->redirectToRoute('order_success');
        }

        return $this->render('default/project.html.twig', array(
            'project'    => $project,
            'projects'   => $projects,
            'categories' => $categories,
            'order_form' => $form->createView(),
        ));
    }

    /**
     * @Route("/order/success", name="order_success")
     */
    public function orderSuccessAction()
    {
        return $this->render('default/order_success.html.twig', array(
        ));
    }
}
