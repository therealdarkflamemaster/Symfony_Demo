<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {


    /**
     * @Route("/", name="home")
     * @param ArticleRepository $articleRepository
     * @return Response
     */
    public function home(ArticleRepository $articleRepository){ // 每个方法都对应着一个url

        return $this->render('index.html.twig', [
            "articles" => $articleRepository->findBy(["published" => 1])
        ]);
    }

    /**
     * @Route("/params/{name}", name="name", defaults={"name": "lishengxiang"},
     *     methods={"GET"})
     */
    public function params($name){
        return new Response("Bonjour, Monsieur : $name");
    }
}