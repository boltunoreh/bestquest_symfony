<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TeammateAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('name', null, array(
                'label' => 'Имя',
            ))
            ->add('position', null, array(
                'label' => 'Должность',
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('isActive', null, array(
                'label' => 'Активен',
            ))
            ->addIdentifier('id')
            ->addIdentifier('name', null, array(
                'label'        => 'Имя',
                'header_style' => 'width: 35%',
            ))
            ->addIdentifier('position', null, array(
                'label' => 'Должность',
            ))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
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
            ->add('name', TextType::class, array(
                'label' => 'Имя',
            ))
            ->add('position', TextType::class, array(
                'label' => 'Должность',
            ))
            ->add('isActive', CheckboxType::class, array(
                'label'    => 'Активен',
                'required' => false,
            ))
            ->add('sign', TextareaType::class, array(
                'label' => 'Подпись',
            ))
            ->add('photo', 'sonata_media_type', array(
                'label'    => 'Фотография',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'default',
                'required' => false,
                'attr'     => array(
                    'class' => 'admin-teammate-photo',
                ),
            ))
        ;
    }
}
