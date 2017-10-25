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
            ->add('name', null, [
                'label' => 'Имя',
            ])
            ->add('position', null, [
                'label' => 'Должность',
            ])
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('isActive', null, [
                'label' => 'Активен',
            ])
            ->addIdentifier('id')
            ->addIdentifier('name', null, [
                'label'        => 'Имя',
                'header_style' => 'width: 35%',
            ])
            ->addIdentifier('position', null, [
                'label' => 'Должность',
            ])
            ->add('sortOrder')
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ],
                'label'   => 'Действия',
            ])
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', TextType::class, [
                'label' => 'Имя',
            ])
            ->add('position', TextType::class, [
                'label' => 'Должность',
            ])
            ->add('isActive', CheckboxType::class, [
                'label'    => 'Активен',
                'required' => false,
            ])
            ->add('sign', TextareaType::class, [
                'label' => 'Подпись',
            ])
            ->add('photo', 'sonata_media_type', [
                'label'    => 'Фотография',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'teammate',
                'required' => false,
                'attr'     => [
                    'class' => 'admin-teammate-photo',
                ],
            ])
            ->add('sortOrder')
        ;
    }
}
