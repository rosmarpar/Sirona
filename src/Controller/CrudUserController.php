<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;



class CrudUserController extends AbstractController
{
    /**
     * @Route("/admin/workers", name="show_workers", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('crud_user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/new_worker", name="add_worker", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository,UserPasswordEncoderInterface $upi): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //busca si el usuario existe en la base de datos
            $userExist = $userRepository->findOneBy(['email' => $user->getEmail()]);
            if($userExist){
                $this->addFlash('error', 'El usuario ya existe');
                return $this->redirectToRoute('add_worker');
            }else{
                  $brochureFile = $form['photo']->getData();
                if ($brochureFile) {
                    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = iconv('UTF-8', 'ASCII//TRANSLIT', $originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

                    try {
                        $brochureFile->move(
                            $this->getParameter('files_directory'),
                            $newFilename
                        );
                    } catch (FileException $e) {
                        throw new \Exception('Error al subir el archivo');
                    }
                }
                $user->setPhoto($newFilename);
                $user->setPassword($upi->encodePassword($user, $form['password']->getData()));
                $userRepository->add($user);
            
                return $this->redirectToRoute('show_workers', [], Response::HTTP_SEE_OTHER);
            }
            
        }

        return $this->renderForm('crud_user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/show_worker/{id}", name="show_worker", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('crud_user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/admin/edit_worker/{id}", name="edit_worker", methods={"GET", "POST"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, UserPasswordEncoderInterface $upi): Response
    {
       //buscar si el usuario tiene foto 
        $userExist = $userRepository->findOneBy(['email' => $user->getEmail()]);
        $contiene = $userExist->getPhoto();

        if($contiene){
            $user->setPhoto($contiene);
        }


        $form = $this->createFormBuilder($user)  
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
        ->add('password', PasswordType::class,
            [
                'label' => 'Contraseña',
                'attr' => [
                    'placeholder' => 'Ingrese su contraseña',
                    'class' => 'form-control',
                    'name' => 'password',
                    'maxlength' => '50',
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
                    'name' => 'lastname',
                    'maxlength' => '50',
                ]
            ])
            ->add('adress', TextType::class,
            [
                'label' => 'Dirección',
                'attr' => [
                    'placeholder' => 'Ingrese su dirección',
                    'class' => 'form-control',
                    'name' => 'adress',
                    'maxlength' => '50',
                ]
            ])
        ->add('phone', TextType::class,
            [
                'label' => 'Teléfono',
                'attr' => [
                    'placeholder' => 'Ingrese su teléfono',
                    'class' => 'form-control',
                    'name' => 'phone',
                    'maxlength' => '10',
                ]
            ])
        ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($upi->encodePassword($user, $form['password']->getData()));
            $user->setRoles(['ROLE_USER']);
            $userRepository->add($user);
            return $this->redirectToRoute('show_workers', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('crud_user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);


    }

    /**
     * @Route("/admin/delete_worker/{id}", name="delete_worker", methods={"POST"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
        }

        return $this->redirectToRoute('show_workers', [], Response::HTTP_SEE_OTHER);
    }
}
