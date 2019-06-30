<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use App\Form\BienType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminBienController extends AbstractController
{
    /**
     * @return Response
     * @Route("/admin", name="admin_index")
     */
    public function index(): Response
    {
        $biens = $this->getDoctrine()->getRepository(Bien::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'biens' => $biens
        ]);
    }

    /**
     * @return Response
     * @Route("/admin/ajouter", name="admin_ajouter")
     */
    public function ajouter(Request $request): response
    {
        $bien = new Bien();
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($bien);
            $em->flush();
            $this->addFlash('success', 'Le bien a été ajouté avec succés');

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/ajouter.html.twig', [
            'bien' => $bien,
            'form' => $form->createView()
        ]);
    }

    /**
     * @return Response
     * @Route("/admin/editer/{id}", name="admin_editer")
     */
    public function editer(Bien $bien, Request $request): Response
    {
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            $this->addFlash('success', 'Le bien a été édité avec succés');

            return $this->redirectToRoute('admin_index');
        }

        return $this->render('admin/editer.html.twig', [
            'bien' => $bien,
            'form' => $form->createView()
        ]);
    }

    /**
     * @return Response
     * @Route("admin/supprimer/{id}", name="admin_supprimer")
     */
    public function supprimer(Bien $bien): Response
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($bien);
        $em->flush();
        $this->addFlash('success', 'Le bien a été supprimé avec succés');

        return $this->redirectToRoute('admin_index');
    }

}