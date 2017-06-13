<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => false,
            ))
            ->add('email', EmailType::class, array(
                'label' => false,
            ))
            ->add('phone', TextType::class, array(
                'label' => false,
            ))
            ->add('members', IntegerType::class, array(
                'label' => false,
            ))
            ->add('date', TextType::class, array(
                'label' => false,
            ))
            ->add('description', TextareaType::class, array(
                'label' => false,
            ))
            ->add('goal', TextType::class, array(
                'label' => false,
            ))
            ->add('fieldOfActivity', TextType::class, array(
                'label' => false,
            ))
            ->add('averageAge', TextType::class, array(
                'label' => false,
            ))
            ->add('likedProjects', TextareaType::class, array(
                'label' => false,
            ))
            ->add('dislikedProjects', TextareaType::class, array(
                'label' => false,
            ))
            ->add('ideas', TextareaType::class, array(
                'label' => false,
            ))
            ->add('copyMe', CheckboxType::class, array(
                'label' => false,
                'required' => false,
            ))
        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_feedback_type';
    }
}
