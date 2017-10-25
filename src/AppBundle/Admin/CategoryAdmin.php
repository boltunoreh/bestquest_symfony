<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title', null, [
                'label' => 'Название',
            ])
            ->add('slug', null, [
                'label' => 'Slug',
            ])
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('icon', null, array(
//                'label' => 'Иконка',
//            ))
            ->addIdentifier('isActive')
            ->addIdentifier('id')
            ->addIdentifier('title', null, [
                'label'        => 'Название',
                'header_style' => 'width: 35%',
            ])
            ->add('slug', null, [
                'label' => 'Slug',
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
            ->add('title', TextType::class, [
                'label' => 'Название',
            ])
            ->add('isActive', CheckboxType::class, [
                'label'    => 'Активна',
                'required' => false,
            ])
            ->add('slug', TextType::class, [
                'label'    => 'Slug',
                'required' => false,
                'attr'     => [
                    'placeholder' => 'генерируется автоматически',
                ],
            ])
            ->add('icon', null, [
                'label' => 'Иконка',
            ])
            ->add('sortOrder')
        ;
    }
}
