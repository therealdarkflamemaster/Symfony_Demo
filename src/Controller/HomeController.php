<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController {

    /**
     * @Route("/", name="home")
     */
    public function home(){ // 每个方法都对应着一个url
        $em = $this->getDoctrine()->getManager();
        $article = new Article();
        $article->setTitle('un titre');
        $article->setDescription('une description');
        $article->setImage('une image');
        $article->setPublished(1);
        $em->persist($article);
        $em->flush();
        return $this->render('index.html.twig', [
            'article' => $article
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