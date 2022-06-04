<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

use App\Entity\Category;
use App\Entity\Provider;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nombre *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del producto',
                    'maxlength' => '50',
                ],
            ])
            ->add('reference', TextType::class, [
                'label' => 'Referencia (max 9 caracteres) *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Referencia del producto',
                    'maxlength' => '9',
                ],
            ])
            ->add('quantity', TextType::class, [
                'label' => 'Cantidad *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Cantidad del producto',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Descripción',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Descripción del producto',
                    'maxlength' => '200',
                ],
            ])
            ->add('price', TextType::class, [
                'label' => 'Precio (Con decimales) *',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Precio del producto',
                ],
            ])
            ->add('proveedor', EntityType::class, [
                'class' => Provider::class,
                'choice_label' => 'name_enterprise',
                'mapped' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.name_enterprise', 'ASC');
            
                },
               
            ])
            ->add('categoria', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'description',
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
            'data_class' => Product::class,
        ]);
    }
}
