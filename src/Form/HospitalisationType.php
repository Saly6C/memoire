<?php

namespace App\Form;

use App\Entity\Hospitalisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class HospitalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateHospitalisation')
            ->add('dateSortie')
            ->add('chambre')
            ->add('patient')
            ->add('pieceDuMalade', ChoiceType::class, [
                'label' => 'Piece Malade',
                'expanded' => true,
                'multiple' => true, 
                'choices' => [
                    'CNI' => 'CNI ',
                    'Passport' => 'Passport'
                ]
            ])
            ->add('numeroPieceMalade')
            ->add('nomDemandeur')
            ->add('pieceDuDemandeur', ChoiceType::class, [
                'label' => 'Piece Demandeur',
                'expanded' => true,
                'multiple' => true, 
                'choices' => [
                    'CNI' => 'CNI ',
                    'Passport' => 'Passport'
                ]
            ])
            ->add('numeroPieceDemandeur')
            
            // ->add('facturation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Hospitalisation::class,
        ]);
    }
}
