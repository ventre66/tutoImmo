<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 23/06/2019
 * Time: 17:14
 */

namespace App\Controller;


use App\Entity\Bien;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BienImmobilierController extends AbstractController
{
    /**
     * @return Response
     * @Route("/biens", name="bien_index")
     */
    public function index(): Response
    {
        $biens = $this->getDoctrine()->getRepository(Bien::class)->findAllVisible();

        return $this->render('bienImmo/index.html.twig', [
            'biens' => $biens
        ]);
    }

    /**
     * @return Response
     * @Route("/bien/{slug}-{id}", name="bien_visualiser", requirements={"slug": "[a-z0-9\-]*"} )
     */
    public function visualiser(Bien $bien, string $slug): Response
    {
        if($bien->getSlug() !== $slug){
            return $this->redirectToRoute('bien_visualiser', [
                'id' => $bien->getId(),
                'slug' => $bien->getSlug()
            ], 301);

        }
        return $this->render('bienImmo/visualiser.html.twig', [
            'bien' => $bien
        ]);
    }
}