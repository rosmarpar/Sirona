<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,
                [
                    'label' => 'Email',
                    'attr' => [
                        'placeholder' => 'Ingrese su email',
                        'class' => 'form-control',
                        'name' => 'email',
                        'maxlength' => '50',
                    ]
                ])
            ->add('showpassword', CheckboxType::class, [
                'mapped' => false,
                'label' => 'Mostrar contraseña',
                'attr' => [
                   
                    'id' => 'showPassword',
                    'required' => false,
                ]
            ])
            ->add('password', PasswordType::class,[
                    'label' => 'Contraseña',
                    'attr' => [
                        'placeholder' => 'Ingrese su contraseña',
                        'class' => 'form-control',
                        'name' => 'password',
                        'id' => 'password',
                    ]
                ])
            
            
            ->add('name', TextType::class,
                [
                    'label' => 'Nombre',
                    'attr' => [
                        'placeholder' => 'Ingrese su nombre',
                        'class' => 'form-control',
                        'name' => 'name',
                        'maxlength' => '20',
                    ]
                ])
            ->add('surname', TextType::class,
                [
                    'label' => 'Apellido',
                    'attr' => [
                        'placeholder' => 'Ingrese su apellido',
                        'class' => 'form-control',
                        'name' => 'surname',
                        'maxlength' => '50',
                    ]
                ])
            ->add('adress', TextType::class,
                [
                    'label' => 'Direccion',
                    'attr' => [
                        'placeholder' => 'Ingrese su direccion',
                        'class' => 'form-control',
                        'name' => 'adress',
                        'maxlength' => '50',
                    ]
                ])
            ->add('phone', TextType::class,
                [
                    'label' => 'Telefono',
                    'attr' => [
                        'placeholder' => 'Ingrese su telefono',
                        'class' => 'form-control',
                        'name' => 'phone',
                        'maxlength' => '20',
                    ]
                ])
            ->add('photo', FileType::class, [
                'label' => 'Fichero',
                'required' => false 
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
