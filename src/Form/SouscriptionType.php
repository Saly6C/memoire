<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class SouscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('password', PasswordType::class)
            ->add('confirmPassword', PasswordType::class)
            ->add('status', CheckboxType::class, [
                'label' => 'Compte activé',
                'attr' => ['class' => 'btn btn-success', 'value' => 'compte_actif', 'checked'   => 'checked']
            ]) 
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles:',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Admin' => 'Admin',
                    'Assistant' => 'Assistant',
                    'Medecin' => 'Medecin',
                ]
            ])
            
            ;
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
