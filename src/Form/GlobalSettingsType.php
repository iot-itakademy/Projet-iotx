<?php

namespace App\Form;

use App\Entity\GlobalSettings;
use App\Entity\SurveyMode;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GlobalSettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('timeZone', TextType::class)
            ->add('lastEditBy', TextType::class)
            ->add('alert_mail', CheckboxType::class)
            ->add('SurveyMode', EntityType::class, [
                'class' => SurveyMode::class,
                'choice_label' => 'libelle',
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GlobalSettings::class,
        ]);
    }
}
