<?php

namespace App\Form;

use App\Entity\Mailbox;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use App\Entity\User;

class MailboxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('title', TextType::class, [
                'label' => 'Titulo',
                
                'attr' => [
                    'placeholder' => 'Asunto del mensaje',
                    'class' => 'form-control',
                    'name' => 'title',
                    ]
            ])

            //agregar en descripcion un textarea
            ->add('message', TextareaType::class, [
                'label' => 'Descripcion',
                'attr' => [
                    'placeholder' => 'Descripcion del mensaje',
                    'class' => 'form-control',
                    'name' => 'description',
                    ]
            ])

            ->add('save', SubmitType::class, [
                'label' => 'Enviar mensaje',
                'attr' => [
                    'name' => 'save',
                    ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mailbox::class,
            
        ]);
    }
}
