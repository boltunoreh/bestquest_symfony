<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
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
                'attr'  => array(
                    'placeholder' => 'Как к вам обращаться?',
                ),
            ))
            ->add('email', EmailType::class, array(
                'label' => false,
                'attr'  => array(
                    'placeholder' => 'Ваш e-mail',
                ),
            ))
            ->add('phone', TextType::class, array(
                'label' => false,
                'attr'  => array(
                    'placeholder' => 'Ваш телефон',
                ),
            ))
            ->add('members', IntegerType::class, array(
                'label' => false,
            ))
            ->add('date', TextType::class, array(
                'label' => false,
            ))
            ->add('description', TextareaType::class, array(
                'label' => false,
                'attr'  => array(
                    'placeholder' => 'Подробности',
                ),
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
