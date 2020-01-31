<?php

namespace App\Controller;

use App\Repository\ManagerRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(UserRepository $userRepository, ManagerRepository $managerRepository,Security $security)
    {
        //we choose a user in DB before using security bundle


        $user =   $security->getUser();
        $manager = $managerRepository->findOneByUser($user);
        dump($manager);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
