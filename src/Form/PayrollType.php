<?php

namespace App\Form;

use App\Entity\Payroll;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\User;

class PayrollType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'input' => 'datetime',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('salary', TextType::class, [
                'label' => 'Salario',
                'required' => true,
            ])
            ->add('file', FileType::class, [
                'label' => 'Fichero',
                'required' => false,
            ])
            ->add('Trabajador', EntityType::class, [
                'class' => User::class,
                'placeholder' => 'Seleccione un trabajador',
                'choice_label' => 'name',
                'mapped' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('e');
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Payroll::class,
        ]);
    }
}
