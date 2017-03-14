<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title', TextType::class, array(
                'label' => 'Название',
            ))
            ->add('category', EntityType::class, array(
                'label' => 'Категория',
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
            ->addIdentifier('title', null, array(
                'label'        => 'Название',
                'header_style' => 'width: 35%',
            ))
            ->add('slug', null, array(
                'label' => 'Slug',
            ))
            ->add('category', null, array(
                'label' => 'Категория',
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
            ->add('title', TextType::class, array(
                'label' => 'Название',
            ))
            ->add('slug', TextType::class, array(
                'label'    => 'Slug (генерируется автоматически)',
                'required' => false,
            ))
            ->add('isActive', CheckboxType::class, array(
                'label' => 'Активен',
            ))
            ->add('isInSlider', CheckboxType::class, array(
                'label' => 'В главном слайдере',
            ))
            ->add('category', 'sonata_type_model', array(
                'label'       => 'Категория',
                'empty_value' => '',
                'btn_add'     => false,
            ))
            ->add('sliderAnnotation', TextareaType::class, array(
                'label' => 'Аннотация',
            ))
            ->add('sliderDescription', TextareaType::class, array(
                'label' => 'Описание',
            ))
        ;
    }
}
