<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findAll();

        // dd($articles);

        // foreach ($articles as $article) {
        //     dd($article->getId());
        // }

        // $articles = $articleRepository->getAllArticles();

        return $this->render(
            'home\home.html.twig',
            ['articles' => $articles]

        );
    }
}
