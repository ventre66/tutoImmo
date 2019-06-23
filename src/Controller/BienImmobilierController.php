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
     * @Route("/biens", name="bien")
     */
    public function index(): Response
    {
        $biens = $this->getDoctrine()->getRepository(Bien::class)->findAllVisible();

        return $this->render('bienImmo/index.html.twig');
    }
}