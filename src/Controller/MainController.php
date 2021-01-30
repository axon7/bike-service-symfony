<?php
namespace App\Controller;

use App\Entity\Repair;
use App\Repository\RepairCommentRepository;
use App\Repository\RepairRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
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
    public function show(RepairRepository $repairRepository): Response
    {
//        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $repairs = $repairRepository->findAll();
        return $this->render('main/show.html.twig', ['repair_list' => $repairs]);
    }

    /**
     * @Route("/naprawa/nowa", name="app_repair_new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {

        $bikeModel = $request->request->get('bike-model');
        $name = $request->request->get('name');
         $repair = new Repair();
        $repair->setBikeModel($bikeModel)
                ->setCompleted(false)
                ->setName($name);
        $entityManager->persist($repair);
        $entityManager->flush();

        return $this->redirectToRoute("app_repairs_list");
    }

    /**
     * @Route("/naprawa/{id}", name="app_repair")
     * @param RepairRepository $repairRepository
     * @param RepairCommentRepository $repairCommentRepository
     * @param int $id
     * @return Response
     */
    public function showSingle(RepairRepository $repairRepository, RepairCommentRepository $repairCommentRepository, int $id): Response
    {
        /** @var Repair|null $repairs */
        $repair = $repairRepository->findOneBy(['id'=> $id]);

        $comments = $repairCommentRepository->findBy(['repair' => $id]);

        if(!$repair){
            throw $this->createNotFoundException(sprintf('brak takiej naprawy'));
        }

        return $this->render('main/showsingle.html.twig', ['repair' => $repair, 'comments'=>$comments]);


    }
}