<?php

namespace AppBundle\Admin;

use AppBundle\Entity\Category;
use AppBundle\Entity\Project;
use AppBundle\Entity\ProjectPhoto;
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
            ->add('title', null, array(
                'label' => 'Название',
            ))
            ->add('categories', null, array(
                'label' => 'Категории',
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
            ->add('categories', null, array(
                'label' => 'Категории',
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
                'label'    => 'Slug',
                'required' => false,
                'attr'     => array(
                    'placeholder' => 'генерируется автоматически',
                ),
            ))
            ->add('isActive', CheckboxType::class, array(
                'label'    => 'Активен',
                'required' => false,
            ))
            ->add('isInSlider', CheckboxType::class, array(
                'label'    => 'В главном слайдере',
                'required' => false,
            ))
            ->add('categories', 'sonata_type_model', array(
                'label'    => 'Категории',
                'class'    => Category::class,
                'btn_add'  => false,
                'multiple' => true,
            ))
            ->add('sliderAnnotation', TextareaType::class, array(
                'label' => 'Аннотация для слайдера',
            ))
            ->add('sliderDescription', TextareaType::class, array(
                'label' => 'Описание для слайдера',
            ))
            ->add('sliderSmallImage', 'sonata_media_type', array(
                    'label'    => 'Изображение слайдера (маленькое)',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('sliderLargeImage', 'sonata_media_type', array(
                    'label'    => 'Изображение слайдера (большое)',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('description', TextareaType::class, array(
                'label' => 'Описание',
            ))
            ->add('reglament', TextType::class, array(
                'label' => 'Регламент',
            ))
            ->add('photos', 'sonata_type_collection',
                array(
                    'label'        => 'Фото',
                    'required'     => false,
                    'by_reference' => false,
                    'attr'         => array(
                        'class' => 'admin-project-photos',
                    ),
                    'btn_add'      => 'Добавить изображение',
                ),
                array(
                    'edit'         => 'inline',
                    'inline'       => 'table',
                    'allow_delete' => true,
                )
            )
            //TODO color picker?
            ->add('color', TextType::class, array(
                'label' => 'Цвет',
            ))
            ->add('headerBackgroundImage', 'sonata_media_type', array(
                    'label'    => 'Фон заголовка',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('descriptionBackgroundImage', 'sonata_media_type', array(
                    'label'    => 'Фон описания',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('stripeBackgroundImage', 'sonata_media_type', array(
                    'label'    => 'Фон полоски',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('formBackgroundImage', 'sonata_media_type', array(
                    'label'    => 'Фон формы',
                    'provider' => 'sonata.media.provider.image',
                    'context'  => 'default',
                    'required' => false,
                    'attr'     => array(
                        'class' => 'admin-project-image',
                    ),
                )
            )
            ->add('icon', TextType::class, array(
                'label' => 'иконка',
            ))
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
    }
}