<?php

namespace App\Form;

use App\Entity\Sensors;
use App\Entity\SensorType;
use App\Form\DataTransformer\DataTransformer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SensorsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add($builder->create('params', TextareaType::class)->addModelTransformer(new DataTransformer()))
            ->add('name', TextType::class)
            ->add('type', EntityType::class, [
                'class' => SensorType::class,
                'choice_label' => 'type',
                'multiple' => false
            ])
            ->add('lastEditBy', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sensors::class,
        ]);
    }
}
