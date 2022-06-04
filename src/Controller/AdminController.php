<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\AgregarType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

use App\Form\MailboxType;
use App\Entity\Mailbox;
use App\Form\PayrollType;
use App\Entity\Payroll;
use App\Entity\Product;



class AdminController extends AbstractController
{
    /**
     * @Route("admin", name="admin")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        return $this->render('admin/main.html.twig', [
            'controller_name' => 'AdminController',
            'user' => $user
        ]);
    }

     /**
      * @Route("/admin/add_payroll", name="add_payroll")
      */
        public function add_payroll(Request $request, EntityManagerInterface $em): Response
        {
            $payroll = new Payroll();
            $form = $this->createForm(PayrollType::class, $payroll);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $brochureFile = $form['file']->getData();
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
                    $payroll->setFile($newFilename);
                } 
                //buscar el id del usuario seleccionado
                $user = $em->getRepository(User::class)->find($form['Trabajador']->getData());
                $payroll->setUser($user);
                $em->persist($payroll);
                $em->flush();
                return $this->redirectToRoute('add_payroll');
                
            }
            return $this->render('admin/add_payroll.html.twig', [
                'form' => $form->createView(),
            ]);

        }

        /**
         * @Route("/admin/admin_search", name="admin_search")
         */
        public function admin_search(Request $request, EntityManagerInterface $em): Response{

            return $this->render('admin/medicaments.html.twig', [
                'controller_name' => 'AdminController',
            ]);
        }
    /**
     * @Route("/admin/ajax_post", name="ajax_post_admin")
     */
    public function ajaxPostAdmin(Request $request, EntityManagerInterface $em){
        $search = $request->get('info');
        $names = $em->getRepository(Product::class)->findName($search);
        $jsonData = [];
        $idx = 0;
        foreach($names as $name){
            $temp = array(
                'Nombre: '. $name->getName(),
                'Cantidad: '.$name->getQuantity(),
                'Precio: '.$name->getPrice().'€'
            );
            $jsonData[$idx++] = $temp;
        }
        return $this->json($jsonData);  
    }
}
