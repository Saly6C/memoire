<?php

namespace App\Form;

use App\Entity\Consultation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateConsultation', DateTimeType::class, [
                'widget'=> 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker', 'placeholder' => 'Cliquez pour choisir une date et heure'],                
            ])
            ->add('diagnostic')
            ->add('prochainRV')
            ->add('autre')
            // ->add('facturation')
            ->add('patient')
            ->add('rendezVous')
            ->add('personnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Consultation::class,
        ]);
    }
}
