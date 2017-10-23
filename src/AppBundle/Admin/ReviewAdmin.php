<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ReviewAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('author', null, array(
                'label' => 'Автор',
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
            ->addIdentifier('author', null, array(
                'label'        => 'Автор',
                'header_style' => 'width: 35%',
            ))
            ->addIdentifier('company', null, array(
                'label' => 'Компания',
            ))
            ->add('project')
            ->add('sortOrder')
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
            ->add('project')
            ->add('photo', 'sonata_media_type', array(
                    'label'    => 'Фото',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_review_photo',
                    'required' => false,
                )
            )
            ->add('author', TextType::class, array(
                'label' => 'Автор',
            ))
            ->add('company', TextType::class, array(
                'label'    => 'Компания',
                'required' => false,
            ))
            ->add('positionIncompany', TextType::class, array(
                'label'    => 'Должность',
                'required' => false,
            ))
            ->add('content', TextareaType::class, array(
                'label' => 'Текст отзыва',
                'attr'  => array(
                    'rows'  => 10,
                ),
            ))
            ->add('isActive', CheckboxType::class, array(
                'label'    => 'Активен',
                'required' => false,
            ))
            ->add('sortOrder')
        ;
    }
}
