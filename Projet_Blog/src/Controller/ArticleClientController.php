<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Services\DBManager\PDOManager;
use App\Model\Article;
use DateTime;


class ArticleClientController 
{
    public function list() {
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager);
        $categoryRepository = new CategoryRepository($manager);
        
        $articles = $articleRepository->findAll();
        $categories = $categoryRepository->findAll();


        require __DIR__.'/../View/articleClient/list.php';
    }

    public function single() {
        $id = $_GET['articleId'];
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager);
        $categoryRepository = new CategoryRepository($manager);
        $commentRepository = new CommentRepository($manager);

        $article = $articleRepository->findOneById($id);
        $categories = $categoryRepository->findAll();
        $comments = $commentRepository->findAll();

        $category = $categoryRepository->findOneById($article->getCategoryId());


        require __DIR__.'/../View/articleClient/single.php';

    }
}