<?php

namespace App\Controller;

use App\Entity\Ressource;
use App\Form\RessourceType;
use App\Repository\RessourceRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ressource")
 */
class RessourceController extends AbstractController
{
    /**
     * @Route("/", name="ressource_index", methods={"GET"})
     * @param PaginatorInterface $paginator
     * @param RessourceRepository $ressourceRepository
     * @param Request $request
     * @return Response
     */
    public function index( PaginatorInterface $paginator, RessourceRepository $ressourceRepository,Request $request): Response
    {
        $resultat = count($ressourceRepository->findAll());
        $resultat1= count($ressourceRepository->findBy(['Diplomes'=>'BTS']));
        dump($resultat);
        dump($resultat1);
        $ressources= $paginator->paginate($ressourceRepository->FindAllRessourceQuery(),$request->query->getInt('page','1'),7);
        return $this->render('ressource/index.html.twig', [
            'ressources' => $ressources,
        ]);
    }

    /**
     * @Route("/new", name="ressource_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $ressource = new Ressource();
        $form = $this->createForm(RessourceType::class, $ressource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ressource);
            $entityManager->flush();
            $this->addFlash('success','Employé créé avec succès');
            return $this->redirectToRoute('ressource_index');
        }

        return $this->render('ressource/new.html.twig', [
            'ressource' => $ressource,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="ressource_show", methods={"GET"})
     * @param Ressource $ressource
     * @return Response
     */
    public function show(Ressource $ressource): Response
    {
        return $this->render('ressource/show.html.twig', [
            'ressource' => $ressource,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="ressource_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Ressource $ressource
     * @return Response
     */
    public function edit(Request $request, Ressource $ressource): Response
    {
        $form = $this->createForm(RessourceType::class, $ressource);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('info','Modifications éffectuées avec succès');
            return $this->redirectToRoute('ressource_index');
        }

        return $this->render('ressource/edit.html.twig', [
            'ressource' => $ressource,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ressource_delete", methods={"DELETE"})
     * @param Request $request
     * @param Ressource $ressource
     * @return Response
     */
    public function delete(Request $request, Ressource $ressource): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ressource->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ressource);
            $entityManager->flush();
        }
        $this->addFlash('info','Suppression éffectuée avec success');
        return $this->redirectToRoute('ressource_index');
    }
}
