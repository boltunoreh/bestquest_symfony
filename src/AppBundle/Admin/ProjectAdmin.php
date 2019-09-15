<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectPhoto;
use AppBundle\Entity\Stage;
use KunicMarko\ColorPickerBundle\Form\Type\ColorPickerType;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectAdmin extends AbstractAdmin
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
            ->add('slug', TextType::class, [
                'label'    => 'Slug',
                'required' => false,
                'attr'     => [
                    'placeholder' => 'генерируется автоматически',
                ],
            ])
            ->add('isActive', CheckboxType::class, [
                'label'    => 'Активен',
                'required' => false,
            ])
            ->add('isInSlider', CheckboxType::class, [
                'label'    => 'В главном слайдере',
                'required' => false,
            ])
            ->add('sortOrder')
            ->add('sliderAnnotation', TextareaType::class, [
                'label' => 'Аннотация для слайдера',
            ])
            ->add('sliderLargeImage', 'sonata_media_type', [
                    'label'    => 'Изображение слайдера (большое)',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_slider_large_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
            ->add('videoId', null, [
                'required' => false,
            ])
            ->add('type')
            ->add('members')
            ->add('place')
            ->add('movementType')
            ->add('duration')
            ->add('gadget')
            ->add('age')
            ->add('description', TextareaType::class, [
                'label' => 'Описание',
                'attr'  => [
                    'rows'  => 10,
                ],
            ])
            ->add('stages', 'sonata_type_collection',
                [
                    'label' => 'Регламент',
                ],
                [
                    'edit'     => 'inline',
                    'inline'   => 'table',
                    'sortable' => 'position',
                ]
            )
            ->add('photos', 'sonata_type_collection',
                [
                    'label'        => 'Фото',
                    'required'     => false,
                    'by_reference' => false,
                    'attr'         => [
                        'class' => 'admin-project-photos',
                    ],
                    'btn_add'      => 'Добавить изображение',
                ],
                [
                    'edit'         => 'inline',
                    'inline'       => 'table',
                    'allow_delete' => true,
                ]
            )
            ->add('color', ColorPickerType::class, [
                'label' => 'Цвет',
            ])
            ->add('headerBackgroundImage', 'sonata_media_type', [
                    'label'    => 'Фон заголовка',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_background_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
            ->add('formBackgroundImage', 'sonata_media_type', [
                    'label'    => 'Фон формы',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_background_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
        ;
    }

    /**
     * @param Project $project
     */
    public function prePersist($project)
    {
        foreach ($project->getPhotos() as $photo) {
            /* @var $photo ProjectPhoto */
            $photo->setProject($project);
        }
        foreach ($project->getStages() as $stage) {
            /* @var $stage Stage */
            $stage->setProject($project);
        }
    }

    /**
     * @param Project $project
     */
    public function preUpdate($project)
    {
        foreach ($project->getPhotos() as $photo) {
            /* @var $photo ProjectPhoto */
            $photo->setProject($project);
        }
        $project->setPhotos($project->getPhotos());
        foreach ($project->getStages() as $stage) {
            /* @var $stage Stage */
            $stage->setProject($project);
        }
        $project->setStages($project->getStages());
    }
}
