<?php

namespace App\Controller;

use App\Entity\Contractors;
use App\Form\ContractorsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/contractors")
 */
class ContractorsController extends AbstractController
{
    /**
     * @Route("/", name="contractors_index", methods={"GET"})
     */
    public function index(): Response
    {
        $contractors = $this->getDoctrine()
            ->getRepository(Contractors::class)
            ->findAll();

        return $this->render('contractors/index.html.twig', [
            'contractors' => $contractors,
        ]);
    }

    /**
     * @Route("/new", name="contractors_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $contractor = new Contractors();
        $form = $this->createForm(ContractorsType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contractor);
            $entityManager->flush();

            return $this->redirectToRoute('contractors_index');
        }

        return $this->render('contractors/new.html.twig', [
            'contractor' => $contractor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contractors_show", methods={"GET"})
     */
    public function show(Contractors $contractor): Response
    {
        return $this->render('contractors/show.html.twig', [
            'contractor' => $contractor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="contractors_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Contractors $contractor): Response
    {
        $form = $this->createForm(ContractorsType::class, $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('contractors_index');
        }

        return $this->render('contractors/edit.html.twig', [
            'contractor' => $contractor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="contractors_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Contractors $contractor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contractor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contractor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('contractors_index');
    }
}
