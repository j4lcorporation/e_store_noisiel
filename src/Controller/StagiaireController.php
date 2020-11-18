<?php

namespace App\Controller;

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
    /**
     * @Route("/", name="liste")
     */
    public function liste(): Response
    {
        $titrePage = "Accueil";
        $titreSection = "liste des stagaires";
        return $this->render(
            'stagiaire/liste.html.twig',
            [
                "titre_page" => $titrePage,
                "titre_section" => $titreSection,
            ]
        );
    }
}
