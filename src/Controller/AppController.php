<?php

namespace App\Controller;

use App\Entity\Employes;
use App\Form\EmployesType;
use App\Repository\EmployesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(EmployesRepository $repo): Response
    {
        $employes = $repo->findAll();
        return $this->render('app/home.html.twig', [
            'employes' =>  $employes,
        ]);
    }


    #[Route('/app/modifier/{id}', name:"app_modifier")]
    #[Route('/app/ajout', name:'app_ajout')]
    public function form(Request $request, EntityManagerInterface $manager) : Response
        {
            $employes = new Employes;
            $form = $this->createForm(EmployesType::class, $employes );
    
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid())
            {
                $manager->persist($employes);
                $manager->flush();
                return $this->redirectToRoute('app_gestion');
            }
    
            return $this->render('app/form.html.twig', [
                'formEmployes' => $form,
                'editMode' => $employes->getId() !== null

            ]);
        }

        #[Route('/app/supprimer/{id}', name:'app_supprimer')]
    public function supprimer(employes $employes, EntityManagerInterface $manager)
    {
        $manager->remove($employes);
        $manager-> flush();    
        return $this->redirectToRoute('app_gestion');
    }

    
        #[Route('/app/gestion', name:'app_gestion')]
        public function gestion(EmployesRepository $repo) : Response
        {
            $employe = $repo->findAll();
            return $this->render('app/gestion.html.twig', [
                'employes' => $employe,
            ]);
        }

        #[Route('/app/show/{id}', name:"app_show")]
        public function show($id, EmployesRepository $repo)
        {
            $employes = $repo->find($id) ;
            return $this->render('app/show.html.twig', [
                'employes' => $employes,
            ]);
        }
  
}

    
  




