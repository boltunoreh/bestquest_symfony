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

class OrderController extends Controller
{
    /**
     * @Route("/order/{slug}", name="app__order__handle", defaults={"slug": null})
     * @param Request $request
     * @param Project $project
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function handleAction(Request $request, Project $project = null)
    {
        $form = $this->createForm(OrderType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $orderData = $form->getData();

                $order = new Order();
                $order->setName($orderData['name']);
                $order->setEmail($orderData['email']);
                $order->setPhone($orderData['phone']);
                $order->setProject($orderData['project'] ? $orderData['project']->getTitle() : null);
                $order->setQuantity($orderData['quantity']);
                $order->setDate($orderData['date'] ? new \DateTime($orderData['date']) : null);
                $order->setMessage($orderData['message']);

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
                    );

                $res = $this->get('mailer')->send($message);

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
                                    'copy' => true,
                                ]
                            ),
                            'text/html'
                        );

                    $this->get('mailer')->send($messageCopy);
                }

                if ($res) {
                    $success = true;
                    $resultText = 'Ваша заявка отправлена, мы свяжемся с вами в ближайшее время';
                } else {
                    $success = false;
                    $resultText = 'Что-то пошло не так, попробуйте повторить позже';
                }
            } else {
                $success = false;
                $resultText = (string)$form->getErrors();
            }
        }

        $staticText = $this->getDoctrine()->getRepository('AppBundle:StaticText')->findOneBy([
            'type' => StaticText::TYPE_ORDER_FORM,
        ]);

        $projects = $this->getDoctrine()
            ->getRepository('AppBundle:Project')
            ->findBy(['isActive' => true], ['sortOrder' => 'ASC']);

        $renderOpts = [
            'static_text' => $staticText,
            'order_form' => $form->createView(),
            'projects' => $projects,
            'success' => isset($success) ? $success : null,
            'result_text' => isset($resultText) ? $resultText : null,
        ];

        if (null !== $project) {
            $renderOpts['current_project'] = $project;
        }

        return $this->render('default/order.html.twig', $renderOpts);
    }
}
