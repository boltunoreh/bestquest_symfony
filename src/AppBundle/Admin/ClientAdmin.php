<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ClientAdmin extends AbstractAdmin
{
    protected $datagridValues = array(
        '_sort_order' => 'ASC',
        '_sort_by'    => 'sortOrder',
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
            ->add('row')
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
            ->add('title', TextType::class, array(
                'label' => 'Название',
            ))
            ->add('isActive', CheckboxType::class, array(
                'label'    => 'Активен',
                'required' => false,
            ))
            ->add('image', 'sonata_media_type', array(
                'label'    => 'Изображение клиента',
                'provider' => 'sonata.media.provider.image',
                'context'  => 'client',
                'required' => false,
                'attr'     => array(
                    'class' => 'admin-client-image',
                ),
            ))
            ->add('row')
            ->add('sortOrder')
        ;
    }
}
