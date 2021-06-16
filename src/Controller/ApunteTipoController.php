<?php

namespace App\Controller;

use App\Entity\ApunteTipo;
use App\Form\ApunteTipoType;
use App\Repository\ApunteTipoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/apunte/tipo")
 */
class ApunteTipoController extends AbstractController
{
    /**
     * @Route("/", name="apunte_tipo_index", methods={"GET"})
     */
    public function index(ApunteTipoRepository $apunteTipoRepository): Response
    {
        return $this->render('apunte_tipo/index.html.twig', [
            'apunte_tipos' => $apunteTipoRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="apunte_tipo_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $apunteTipo = new ApunteTipo();
        $form = $this->createForm(ApunteTipoType::class, $apunteTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($apunteTipo);
            $entityManager->flush();

            return $this->redirectToRoute('apunte_tipo_index');
        }

        return $this->render('apunte_tipo/new.html.twig', [
            'apunte_tipo' => $apunteTipo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apunte_tipo_show", methods={"GET"})
     */
    public function show(ApunteTipo $apunteTipo): Response
    {
        return $this->render('apunte_tipo/show.html.twig', [
            'apunte_tipo' => $apunteTipo,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="apunte_tipo_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ApunteTipo $apunteTipo): Response
    {
        $form = $this->createForm(ApunteTipoType::class, $apunteTipo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('apunte_tipo_index');
        }

        return $this->render('apunte_tipo/edit.html.twig', [
            'apunte_tipo' => $apunteTipo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="apunte_tipo_delete", methods={"POST"})
     */
    public function delete(Request $request, ApunteTipo $apunteTipo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$apunteTipo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($apunteTipo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('apunte_tipo_index');
    }
}
