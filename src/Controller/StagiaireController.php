<?php

namespace App\Controller;

use App\Repository\StagiaireRepository;
use App\Service\AppService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class StagiaireController
 * @package App\Controller
 * @Route("/", name="stagiaire_")
 */
class StagiaireController extends AbstractController
{
    private $service;

    public function __construct(AppService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/", name="liste")
     */
    public function liste(StagiaireRepository $repository): Response
    {
        $titrePage = $this->service->capitalize("Accueil");
        $titreSection = $this->service->mettre_en_majuscule("liste des stagaires");

        return $this->render(
            'stagiaire/liste.html.twig',
            [
                "titre_page" => $titrePage,
                "titre_section" => $titreSection,
                'stagiaires'=>$stagiaires = $repository->findAll(),
            ]
        );
    }
}
