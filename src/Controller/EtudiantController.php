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

    #[Route('/list', name: 'Liste')]
    public function listEtudiant()
    {
        // Liste des étudiants
        $etudiants = array("Ali", "Med");

        // Liste des modules
        $modules = array(
            array(
                "nom" => "Symfony",
                "id" => 1,
                "enseignant" => "Ali",
                "nbrHeures" => 42,
                "date" => "12-12-2021"
            ),
            array(
                "nom" => "JEE",
                "id" => 2,
                "enseignant" => "Med",
                "nbrHeures" => 31,
                "date" => "12-10-2021"
            ),
            array(
                "nom" => "BD",
                "id" => 3,
                "enseignant" => "Islem",
                "nbrHeures" => 21,
                "date" => "12-09-2021"
            )
        );

        // Envoi des données à la vue Twig
        return $this->render('etudiant/list.html.twig', array(
            'etudiants' => $etudiants,
            'listeModules' => $modules
        ));
    }

    #[Route('/etudiant/affecter', name: 'Affectation')]
    public function affecter(): Response
    {
        return $this->render('etudiant/affecter.html.twig');
    }
    #[Route('/layout', name: 'app-layout')]
    public function layoutTest(): Response
    {
        return $this->render('etudiant/layout.html.twig');
    }

    #[Route('/indexFils', name: 'index-fils')]
    public function indexFils(): Response
    {
        return $this->render('etudiant/index.html.twig');
    }

}


