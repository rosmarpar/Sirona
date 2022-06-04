<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

use App\Form\MailboxType;
use App\Form\SendEmailType;

use App\Entity\Product;
use App\Entity\User;
use App\Entity\Provider;
use App\Entity\Category;
use App\Entity\Payroll;
use App\Entity\Mailbox;


class UserController extends AbstractController
{
    /**
     * @Route("user", name="user")
     */
    public function index(): Response
    {
        $user = $this->getUser();
        
        return $this->render('user/main.html.twig', [
            'controller_name' => 'UserController',
            'user' => $user,
        ]);
    }

    /**
     * @Route("user/search", name="user_search")
     */
    public function creationFormSearch(Request $request, EntityManagerInterface $em): Response
    {

            return $this->render('user/medicaments.html.twig', [
                'controller_name' => 'UserController',
            ]);
    
    }
    /**
     * @Route("/user/ajax_post", name="ajax_post")
     */
    public function ajaxPost(Request $request, EntityManagerInterface $em){
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
    /**
    * @Route("/user/profile", name="user_profile")
    */
    public function profile(Request $request, EntityManagerInterface $em): Response{

        //buscar el usuario logueado
        $user = $this->getUser();

        return $this->render('user/profile.html.twig', [
            'user' => $user
        ]);
    }

    /**
     * @Route("/user/payroll", name="user_payroll")
     * 
    */
    public function listPayroll(Request $request, EntityManagerInterface $em): Response{

       //buscar las nominas del usuario logueado y la fecha convertirla en un string
        $user = $this->getUser();
        $payrolls = [];

        $search = $em->getRepository(Payroll::class)->findBy(
            ['user' => $user]
        );


        //convertir la fecha a string
        foreach ($search as $s) {
            $fecha = $s->getDate();
            $fecha = $fecha->format('d-m-Y');
            $payrolls[] = [
                'id' => $s->getId(),
                'date' => $fecha,
                'salary' => $s->getSalary(),
                'file' => $s->getFile()
            ];
        
        }

        return $this->render('user/payroll.html.twig', [
            'payrolls' => $payrolls,
            'user' => $user,
        ]);
    }

    /**
     * @Route("/user/messages", name="user_messages")
     **/
    public function sendMessage(Request $request, MailerInterface $mailer): Response{

        $form = $this->createForm(SendEmailType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             $email = (new Email())
            ->from('sirona.rmp@gmail.com')
            ->to('sirona.rmp@gmail.com')
            ->subject($form->getData()['name'])
            ->html('<p>'.$form->getData()['text'].'</p>');

            $mailer->send($email);

            return $this->render('user/main.html.twig', [
                'controller_name' => 'UserController',
                'user' => $this->getUser(),
            ]); 
        }

        return $this->render('user/messages.html.twig', [
            'form' => $form->createView(),
        ]);
    }
       
}
