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
            ->add('name', TextType::class, [
                'label' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => false,
            ])
            ->add('phone', TextType::class, [
                'label' => false,
            ])
            ->add('members', IntegerType::class, [
                'label' => false,
            ])
            ->add('date', TextType::class, [
                'label' => false,
            ])
            ->add('description', TextareaType::class, [
                'label' => false,
            ])
            ->add('goal', TextType::class, [
                'label' => false,
            ])
            ->add('fieldOfActivity', TextType::class, [
                'label' => false,
            ])
            ->add('averageAge', TextType::class, [
                'label' => false,
            ])
            ->add('likedProjects', TextareaType::class, [
                'label' => false,
            ])
            ->add('dislikedProjects', TextareaType::class, [
                'label' => false,
            ])
            ->add('ideas', TextareaType::class, [
                'label' => false,
            ])
            ->add('copyMe', CheckboxType::class, [
                'label' => false,
                'required' => false,
            ])
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
