<?php

namespace App\Form;

use App\Entity\Provider;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ProviderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('cif', TextType::class, [
                'label' => 'CIF',
                'required' => true,

                'attr' => [
                    'class' => 'form-control',
                    'maxlength' => '9',
                    'placeholder' => 'CIF del proveedor',

                ],
            ])
            ->add('name_enterprise', TextType::class, [
                'label' => 'Nombre de la empresa',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre de la empresa',
                    'maxlength' => '30',
                ],
            ])
            ->add('person_contact', TextType::class, [
                'label' => 'Persona de contacto',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Persona de contacto',
                    'maxlength' => '20',
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Email de la empresa',
                ],
            ])
            ->add('adress', TextType::class, [
                'label' => 'Dirección',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Dirección de la empresa',
                    'maxlength' => '50',
                ],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Teléfono',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Teléfono de contacto',
                    'maxlength' => '12',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Provider::class,
        ]);
    }
}
