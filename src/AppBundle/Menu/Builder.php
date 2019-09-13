<?php

namespace AppBundle\Menu;

use AppBundle\Entity\Project;
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
        $projects = $em->getRepository('AppBundle:Project')
            ->findBy(['isActive' => true], ['sortOrder' => 'ASC']);

        /** @var Project $project */
        foreach ($projects as $project) {
            $menu['projects']->addChild($project->getTitle(), [
                'uri' => $this->container->get('router')->generate(
                    'app__project',
                    [
                        'slug' => $project->getSlug(),
                    ]
                ),
            ]);
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
