<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OrderAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by'    => 'id',
    );

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('date')
            ->add('name')
            ->add('email')
            ->add('phone')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('name', null, array(
                'header_style' => 'width: 35%',
            ))
            ->addIdentifier('email')
            ->addIdentifier('phone')
            ->addIdentifier('members')
            ->addIdentifier('date')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                )
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('email')
            ->add('phone')
            ->add('members')
            ->add('date')
            ->add('description')
            ->add('goal')
            ->add('fieldOfActivity')
            ->add('averageAge')
            ->add('likedProjects')
            ->add('dislikedProjects')
            ->add('ideas')
        ;
    }

    /**
     * @inheritDoc
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->remove('edit');
        $collection->remove('delete');
    }
}
