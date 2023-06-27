<?php

namespace App\Controller;

use App\Entity\Evenement;
use App\Form\EvenementType;
use App\Repository\EvenementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/dashboard")
 */
class DashboardController extends AbstractController
{
    /**
     * @Route("/", name="app_dashboard_index", methods={"GET"})
     */
    public function index(EvenementRepository $evenementRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'evenements' => $evenementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_dashboard_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EvenementRepository $evenementRepository): Response
    {
        $evenement = new Evenement();
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementRepository->add($evenement, true);

            return $this->redirectToRoute('app_dashboard_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/new.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_dashboard_show", methods={"GET"})
     */
    public function show(Evenement $evenement): Response
    {
        return $this->render('dashboard/show.html.twig', [
            'evenement' => $evenement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_dashboard_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Evenement $evenement, EvenementRepository $evenementRepository): Response
    {
        $form = $this->createForm(EvenementType::class, $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $evenementRepository->add($evenement, true);

            return $this->redirectToRoute('app_dashboard_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('dashboard/edit.html.twig', [
            'evenement' => $evenement,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_dashboard_delete", methods={"POST"})
     */
    public function delete(Request $request, Evenement $evenement, EvenementRepository $evenementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$evenement->getId(), $request->request->get('_token'))) {
            $evenementRepository->remove($evenement, true);
        }

        return $this->redirectToRoute('app_dashboard_index', [], Response::HTTP_SEE_OTHER);
    }
}
