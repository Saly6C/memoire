<?php

namespace App\Form;

use App\Entity\RendezVous;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class RendezVousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('dateRV')
            ->add('nomClient')
            ->add('email')
            ->add('dateRV', DateTimeType::class, [
                'widget'=> 'single_text',
                'html5' => false,
                'label' => 'Date Rendez-vous',
                'attr' => ['class' => 'js-datepicker', 'placeholder' => 'Cliquez pour choisir une date et heure'],                
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RendezVous::class,
        ]);
    }
}
