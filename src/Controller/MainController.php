<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    /**
    * @Route("/")
    */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/{slug}")
     */
    public function show($slug): Response
    {
        $model_list = ['Unibike', 'Kross', 'Merida'];
        return $this->render('main/show.html.twig', ['model_roweru' => $slug, 'model_list' => $model_list]);

    }
}