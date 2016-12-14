<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_sort_by'    => 'sort',
        '_sort_order' => 'ASC',
    );

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title', null, array(
                'label' => 'Название',
            ))
            ->add('category', null, array(
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
            ->addIdentifier('image', null, array(
                'label'    => 'Изображение',
                'template' => 'ApplicationSonataMediaBundle:Form:admin_form_image_preview.html.twig',
            ))
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
            ->add('sort', null, array(
                'label' => 'Порядок',
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
            ->add('title', null, array(
                'label' => 'Название',
            ))
            ->add('slug', null, array(
                'label'    => 'Slug (генерируется автоматически)',
                'required' => false,
            ))
            ->add('isActive', null, array(
                'label' => 'Активен',
            ))
            ->add('category', 'sonata_type_model', array(
                'label'       => 'Категория',
                'empty_value' => '',
                'btn_add'     => false,
            ))
            ->add('subcategory', null, array(
                'label'    => 'Подкатегория',
                'required' => false,
            ))
            ->add('description', null, array(
                'label' => 'Описание',
            ))
            ->add('weight', null, array(
                'label' => 'Вес',
            ))
            ->add('consist', null, array(
                'label' => 'Состав',
            ))
            ->add('sort', null, array(
                'label' => 'Порядок сортировки',
            ))
            ->add('image',
                'sonata_media_type',
                array(
                    'label'    => 'Основное изображение',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'product_image',
                )
            )
            ->add('additionalImage',
                'sonata_media_type',
                array(
                    'label'    => 'Дополнительное изображение',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'product_additional_image',
                )
            )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
        ;
    }
}
