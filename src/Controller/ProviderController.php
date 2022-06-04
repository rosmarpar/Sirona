<?php

namespace App\Controller;

use App\Entity\Provider;
use App\Form\ProviderType;
use App\Repository\ProviderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ProviderController extends AbstractController
{
    /**
     * @Route("/admin/show_providers", name="show_providers", methods={"GET"})
     */
    public function index(ProviderRepository $providerRepository): Response
    {
        return $this->render('provider/index.html.twig', [
            'providers' => $providerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/new_provider", name="new_provider", methods={"GET", "POST"})
     */
    public function new(Request $request, ProviderRepository $providerRepository): Response
    {
        $provider = new Provider();
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //busca si el usuario existe en la base de datos
            $providerExist = $providerRepository->findOneBy(['cif' => $provider->getCif()]);
            if($providerExist){
                $this->addFlash('error', 'El proveedor ya existe');
                return $this->redirectToRoute('new_provider');
            }else{
                $providerRepository->add($provider);
                return $this->redirectToRoute('show_providers', [], Response::HTTP_SEE_OTHER);
            }
        }

        return $this->renderForm('provider/new.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/show_provider/{id}", name="show_provider", methods={"GET"})
     */
    public function show(Provider $provider): Response
    {
        return $this->render('provider/show.html.twig', [
            'provider' => $provider,
        ]);
    }

    /**
     * @Route("/admin/edit_provider/{id}", name="edit_provider", methods={"GET", "POST"})
     */
    public function edit(Request $request, Provider $provider, ProviderRepository $providerRepository): Response
    {
        $form = $this->createForm(ProviderType::class, $provider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $providerRepository->add($provider);
            return $this->redirectToRoute('show_providers', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('provider/edit.html.twig', [
            'provider' => $provider,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/delete_provider/{id}", name="delete_provider", methods={"POST"})
     */
    public function delete(Request $request, Provider $provider, ProviderRepository $providerRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$provider->getId(), $request->request->get('_token'))) {
            $providerRepository->remove($provider);
        }

        return $this->redirectToRoute('show_providers', [], Response::HTTP_SEE_OTHER);
    }
}
