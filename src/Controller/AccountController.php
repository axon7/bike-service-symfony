<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/konto", name="app_account")
     * @IsGranted("ROLE_USER")
     */
    public function index(): Response
    {
        $user= $this->getUser();

        return $this->render('account/index.html.twig',
            ['user' => $user]
        );
    }
}
