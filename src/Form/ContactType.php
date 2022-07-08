<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, array('label' => 'Nom'))
            ->add('Prenom', TextType::class, array('label' => 'Prénom'))
            ->add('Email', EmailType::class, array('label' => 'Email'))
            ->add('Telephone', TextType::class, array('label' => 'Téléphone', 'attr' =>
                ['pattern' => '^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$', 'maxlength' => 10]))
            ->add('Sujet', ChoiceType::class, [
                'choices' => [
                    'Problème de connexion' => true,
                    'Défaillance de la caméra' => true,
                    'Autre' => true,
                ]
            ], )
            ->add('Message', TextareaType::class, array('required' => false))
            ->add('Envoyer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
