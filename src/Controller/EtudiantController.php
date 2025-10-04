<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'etudiant')]
    public function index(): Response
    {
        return new Response('Bienvenue sur la page des étudiants !');
    }

    #[Route('/etudiant/id/{id}', name: 'affichage_etudiant', requirements: ['id' => '\d{2}'])]
    public function affichageEtudiant(int $id): Response
    {
        return new Response("L'ID de l'étudiant est : $id");
    }

    #[Route('/etudiant/name/{name}', name: 'etudiant_name', requirements: ['name' => '[A-Za-z]+'])]
    public function voirNom(string $name): Response
    {
        return $this->render('etudiant/etudiant.html.twig', [
            'nom' => $name,
        ]);
    }
}
