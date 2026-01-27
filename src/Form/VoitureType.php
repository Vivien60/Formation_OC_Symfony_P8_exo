<?php

namespace App\Form;

use App\Entity\Voiture;
use App\Enum\VoitureTypeTransmission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'required' => true,
            ])
            ->add('description', TextAreaType::class, [
                'required' => false,
            ])
            ->add('typeTransmission', EnumType::class, [
                'class' => VoitureTypeTransmission::class,
                'required' => true,
            ])
            ->add('prixParJour', NumberType::class, [
                'required' => true,
            ])
            ->add('prixParMois', NumberType::class, [
                'required' => true,
            ])
            ->add('nbPlaces', IntegerType::class, [
                'required' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
