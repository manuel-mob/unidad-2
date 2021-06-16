<?php

namespace App\Controller;

use App\Entity\Contenido;
use App\Form\ContenidoType;
use App\Repository\ContenidoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contenido")
 */
class ContenidoController extends AbstractController
{
    /**
     * @Route("/", name="contenido_index", methods={"GET"})
     */
    public function index(ContenidoRepository $contenidoRepository): Response
    {
        return $this->render('contenido/index.html.twig', [
            'contenidos' => $contenidoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="contenido_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contenido = new Contenido();
        $form = $this->createForm(ContenidoType::class, $contenido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contenido);
            $entityManager->flush();

            return $this->redirectToRoute('contenido_index');
        }

        return $this->render('contenido/new.html.twig', [
            'contenido' => $contenido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contenido_show", methods={"GET"})
     */
    public function show(Contenido $contenido): Response
    {
        return $this->render('contenido/show.html.twig', [
            'contenido' => $contenido,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contenido_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contenido $contenido): Response
    {
        $form = $this->createForm(ContenidoType::class, $contenido);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contenido_index');
        }

        return $this->render('contenido/edit.html.twig', [
            'contenido' => $contenido,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contenido_delete", methods={"POST"})
     */
    public function delete(Request $request, Contenido $contenido): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contenido->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contenido);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contenido_index');
    }
}
