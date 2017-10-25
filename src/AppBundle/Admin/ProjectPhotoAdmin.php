<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ProjectPhotoAdmin extends AbstractAdmin
{
    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('project', null, [
                'label' => 'Квест',
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
            ->add('image', 'sonata_media_type', [
                    'label'    => 'Изображение',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_photo_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
            ->add('sortOrder')
        ;
    }
}
