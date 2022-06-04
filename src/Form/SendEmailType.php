<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SendEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class,
                [
                    'label' => 'Nombre',
                    'attr' => [
                        'placeholder' => 'Asunto',
                        'class' => 'form-control',
                        'name' => 'name',
                    ]
                ])
            ->add('email', TextType::class,
                [
                    'label' => 'Email',
                    'attr' => [
                        'placeholder' => 'Para',
                        'class' => 'form-control',
                        'name' => 'email',
                    ]
                ])
            ->add('text', TextareaType::class,
                [
                    'label' => 'Mensaje',
                    'attr' => [
                        'placeholder' => 'Mensaje',
                        'class' => 'form-control',
                        'name' => 'text',
                    ]
                ])
            ->add('save', SubmitType::class, [
                'label' => 'Enviar',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'name' => 'save',
                ]
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
