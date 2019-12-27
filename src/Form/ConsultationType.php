<?php

namespace App\Form;

use App\Entity\Consultation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ConsultationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateConsultation', DateType::class, [
                'widget'=> 'single_text',
                // 'placeholder' => 'Cliquez pour sélectionner une valeur',
                'html5' => false,
                // 'view_timezone' => 'Africa/Dakar',
                'attr' => ['class' => 'js-datepicker']
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
