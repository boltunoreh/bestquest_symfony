<?php

namespace AppBundle\Menu;

use AppBundle\Entity\Category;
use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        // Menu
        $menu->addChild('projects', [
            'route' => 'app__homepage',
            'label' => 'Проекты',
        ]);
        $menu->addChild('about', [
            'route' => 'app__about',
            'label' => 'О компании',
        ]);

        // Projects submenu
        $em = $this->container->get('doctrine')->getManager();
        $categories = $em->getRepository('AppBundle:Category')->findBy([
            'isActive' => true,
        ]);

        /** @var Category $category */
        foreach ($categories as $category) {
            if (isset($options['index']) && true == $options['index']) {
                $menu['projects']->addChild($category->getTitle(), [
                    'attributes' => [
                        'data-slider' => $category->getSlug(),
                    ],
                ]);
            } else {
                $menu['projects']->addChild($category->getTitle(), [
                    'uri' => $this->container->get('router')->generate('app__homepage') . '?' . $category->getSlug(),
                ]);
            }
        }

        // About submenu
        $menu['about']->addChild('team', [
            'uri' => $this->container->get('router')->generate('app__about') . '#team',
            'label' => 'Команда',
        ]);
        $menu['about']->addChild('clients', [
            'uri'   => $this->container->get('router')->generate('app__about') . '#clients',
            'label' => 'Клиенты',
        ]);

        // Configure classes
        $menu->setChildrenAttributes([
            'class' => 'l-header__menu',
        ]);

        $menu['projects']->setChildrenAttributes([
            'class' => 'l-header__submenu js-slider-control',
        ]);

        $menu['about']->setChildrenAttributes([
            'class' => 'l-header__submenu',
        ]);

        return $menu;
    }
}
