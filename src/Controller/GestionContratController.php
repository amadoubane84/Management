<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GestionContratController extends AbstractController
{
    /**
     * @Route("/gestion/home", name="gestion_home")
     */
    public function index()
    {
        return $this->render('gestion/homegestion.html.twig');
    }
}
