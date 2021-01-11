<?php
namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    /**
    * @Route("/", name="app_homepage")
    */
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/naprawy", name="app_repairs_list")
     * @param LoggerInterface $logger
     * @return Response
     */
    public function show(LoggerInterface $logger): Response
    {

        $model_list = ['Unibike', 'Kross', 'Merida'];
        $logger->info('to jest jaki log');
        return $this->render('main/show.html.twig', ['model_list' => $model_list]);

    }
}