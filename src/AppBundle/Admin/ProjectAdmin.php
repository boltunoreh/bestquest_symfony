<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Category;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectPhoto;
use AppBundle\Entity\Review;
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
            ->add('categories', null, [
                'label' => 'Категории',
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
            ->add('categories', null, [
                'label' => 'Категории',
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
            ->add('categories', 'sonata_type_model', [
                'label'    => 'Категории',
                'class'    => Category::class,
                'btn_add'  => false,
                'multiple' => true,
            ])
            ->add('sliderAnnotation', TextareaType::class, [
                'label' => 'Аннотация для слайдера',
            ])
            ->add('sliderDescription', TextareaType::class, [
                'label' => 'Описание для слайдера',
            ])
            ->add('sliderSmallImage', 'sonata_media_type', [
                    'label'    => 'Изображение слайдера (маленькое)',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_slider_small_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
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
            //TODO color picker?
            ->add('color', TextType::class, [
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
            ->add('descriptionBackgroundImage', 'sonata_media_type', [
                    'label'    => 'Фон описания',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'project_background_image',
                    'required' => false,
                    'attr'     => [
                        'class' => 'admin-project-image',
                    ],
                ]
            )
            ->add('stripeBackgroundImage', 'sonata_media_type', [
                    'label'    => 'Фон полоски',
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
            ->add('reviews', 'sonata_type_collection',
                [
                    'label' => 'Отзывы',
                    'btn_add' => 'Добавить отзыв',
                ],
                [
                    'edit'     => 'inline',
                    'sortable' => 'position',
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
        foreach ($project->getReviews() as $review) {
            /* @var $review Review */
            $review->setProject($project);
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
        foreach ($project->getReviews() as $review) {
            /* @var $review Review */
            $review->setProject($project);
        }
        $project->setPhotos($project->getPhotos());
        $project->setReviews($project->getReviews());
    }
}
