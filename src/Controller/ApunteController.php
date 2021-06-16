<?php

namespace App\Controller;

use App\Entity\Apunte;
use App\Form\ApunteType;
use App\Repository\ApunteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/apunte")
 */
class ApunteController extends AbstractController
{
    /**
     * @Route("/", name="apunte_index", methods={"GET"})
     */
    public function index(ApunteRepository $apunteRepository): Response
    {
        return $this->render('apunte/index.html.twig', [
            'apuntes' => $apunteRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="apunte_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $apunte = new Apunte();
        $form = $this->createForm(ApunteType::class, $apunte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($apunte);
            $entityManager->flush();

            return $this->redirectToRoute('contenido_index');
        }

        return $this->render('apunte/new.html.twig', [
            'apunte' => $apunte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apunte_show", methods={"GET"})
     */
    public function show(Apunte $apunte): Response
    {
        return $this->render('apunte/show.html.twig', [
            'apunte' => $apunte,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="apunte_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Apunte $apunte): Response
    {
        $form = $this->createForm(ApunteType::class, $apunte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('apunte_index');
        }

        return $this->render('apunte/edit.html.twig', [
            'apunte' => $apunte,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apunte_delete", methods={"POST"})
     */
    public function delete(Request $request, Apunte $apunte): Response
    {
        if ($this->isCsrfTokenValid('delete'.$apunte->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($apunte);
            $entityManager->flush();
        }

        return $this->redirectToRoute('apunte_index');
    }
}
