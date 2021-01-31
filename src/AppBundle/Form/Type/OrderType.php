<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'required' => false,
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('phone', TextType::class, [
                'label' => false,
            ])
            ->add('project', EntityType::class, [
                'class' => 'AppBundle:Project',
                'choice_label' => 'title',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->where('p.isActive = true');
                },
                'label' => false,
                'required' => false,
                'empty_data' => null,
            ])
            ->add('quantity', IntegerType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('date', TextType::class, [
                'label' => false,
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'label' => false,
                'required' => false,
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
