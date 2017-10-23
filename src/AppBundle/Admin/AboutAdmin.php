<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AboutAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('title')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                ),
                'label'   => 'Действия',
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', TextType::class, array(
                'label' => 'Заголовок',
            ))
            ->add('leftColumn', TextareaType::class, array(
                'label' => 'Левая колонка',
                'attr'  => array(
                    'rows'  => 10,
                ),
            ))
            ->add('rightColumn', TextareaType::class, array(
                'label' => 'Правая колонка',
                'attr'  => array(
                    'rows'  => 10,
                ),
            ))
        ;
    }

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->remove('create')
            ->remove('delete')
        ;
    }
}
