<?php

namespace App\Controller;

use App\Entity\Bien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @return Response
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $biens = $this->getDoctrine()->getRepository(Bien::class)->findLatest();
        return $this->render('home/index.html.twig', [
            'biens' => $biens
        ]);
    }
}