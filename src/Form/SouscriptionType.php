<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SouscriptionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('username')
            ->add('password', PasswordType::class)
            ->add('confirmPassword', PasswordType::class)
            ->add('roles', ChoiceType::class, [
                'label' => 'Rôles:',
                'expanded' => true,
                'multiple' => true,
                'choices' => [
                    'Admin' => 'Admin',
                    'Assistant' => 'Assistant',
                    'Medecin' => 'Medecin',
                ]
            ]);
            // ->add('roles', ChoiceType::class, array(
            //     'label' => 'Rôles:',
            //     'mapped' => true,
            //     'expanded' => true,
            //     'multiple' => true,
            //     'choices' => array(
            //         'ROLE_ADMIN' => 'ADMIN',
            //         'ROLE_ASSISTANT' => 'ASSISTANT',
            //         'ROLE_MEDECIN' => 'MEDECIN'
            //     )
            // )) 

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
