<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class RegistroType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Correo electrónico',
                'attr' => [
                    'placeholder' => 'Correo electrónico',
                ],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Contraseña',
                'attr' => [
                    'placeholder' => 'Contraseña',
                ],
            ])
            ->add('password2', PasswordType::class, [
                'mapped' => false,
                'label' => 'Confirmar contraseña',
                'attr' => [
                    'placeholder' => 'Confirmar contraseña',
                ],
            ])
            ->add('roles', TextType::class, [
                'mapped' => false,
                'label' => 'Rol',
                'attr' => [
                    'placeholder' => 'Rol',
                ],
            ])

            ->add('agregar', SubmitType::class, [
                'label' => 'Registrarse',
                'attr' => [
                    'class' => 'btn btn-primary btn-block',
                ],
            ])
            ->add('foto', FileType::class, [
                'label' => 'Foto',
                'attr' => [
                    'placeholder' => 'Foto',
                ],
                //no es necesario
                'required' => false,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
