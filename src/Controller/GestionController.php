<?php

namespace App\Controller;

use App\Entity\Gestion;
use App\Form\GestionType;
use App\Repository\GestionRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gestion")
 */
class GestionController extends AbstractController
{
    /**
     * @Route("/", name="gestion_index", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @param GestionRepository $gestionRepository
     * @param Request $request
     * @return Response
     */
    public function index(PaginatorInterface $paginator, GestionRepository $gestionRepository,Request $request): Response

    {
        $gestions= $paginator->paginate($gestionRepository->findAllQuery(),
            $request->query->getInt('page', 1),5);
        return $this->render('gestion/index.html.twig', [
            'gestions' => $gestions,
        ]);
    }

    /**
     * @Route("/new", name="gestion_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $gestion = new Gestion();
        $form = $this->createForm(GestionType::class, $gestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gestion);
            $entityManager->flush();

            return $this->redirectToRoute('gestion_index');
        }

        return $this->render('gestion/new.html.twig', [
            'gestion' => $gestion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="gestion_show", methods={"GET"})
     */
    public function show(Gestion $gestion): Response
    {
        return $this->render('gestion/show.html.twig', [
            'gestion' => $gestion,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="gestion_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gestion $gestion): Response
    {
        $form = $this->createForm(GestionType::class, $gestion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gestion_index');
        }

        return $this->render('gestion/edit.html.twig', [
            'gestion' => $gestion,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/delete/{id}", name="gestion_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gestion $gestion): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestion->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gestion);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gestion_index');
    }
}
