<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Certif;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CertifFormeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nomcertificateur', TextType::class, [
            'attr' => [
                'class' => 'form-control'
            ],
            'label' => 'Nom de la Certification'
        ])
    ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}