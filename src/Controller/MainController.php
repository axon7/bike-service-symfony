<?php
namespace App\Controller;

use App\Entity\Repair;
use Doctrine\ORM\EntityManagerInterface;
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

        $repairs = $this->getDoctrine()
            ->getRepository(Repair::class)
            ->findAll();
        return $this->render('main/show.html.twig', ['repair_list' => $repairs]);
    }

    /**
     * @Route("/naprawa/nowa", name="app_repair_new")
     * @param EntityManager $entityManager
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function new(EntityManagerInterface $entityManager): Response
    {
        $repair = new Repair();
        $repair->setBikeModel('Unibike Fusion')
                ->setCompleted(false)
                ->setName('wymiana kierownicy');

        $entityManager->persist($repair);
        $entityManager->flush();
        return new Response( 'dodaj naprawę');
    }

    /**
     * @Route("/naprawa/{id}", name="app_repair")
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function showSingle(int $id): Response
    {
        /** @var Repair|null $repairs */
        $repair = $this->getDoctrine()
            ->getRepository(Repair::class)
            ->findOneBy(['id'=> $id]);

        if(!$repair){
            throw $this->createNotFoundException(sprintf('brak takiej naprawy'));
        }

        return $this->render('main/showsingle.html.twig', ['repair' => $repair]);


    }
}