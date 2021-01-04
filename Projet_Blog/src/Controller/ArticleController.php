<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategoryRepository;
use App\Repository\CommentRepository;
use App\Services\DBManager\PDOManager;
use App\Model\Article;
use DateTime;


class ArticleController 
{
    public function list() {
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager);
        $categoryRepository = new CategoryRepository($manager);
        
        $articles = $articleRepository->findAll();
        $categories = $categoryRepository->findAll();


        require __DIR__.'/../View/article/list.php';
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


        require __DIR__.'/../View/article/single.php';

    }
    public function add() {
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager);
        $categoryRepository = new CategoryRepository($manager);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $date = new DateTime('now');
            $article = new Article();
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            $article->setAuthor($_POST['author']);
            $article->setDate($date->format('Y-m-d H:i:s'));
            $article->setCategoryId($_POST['categoryId']);

            $articleRepository->insert($article);
        }

        $categories = $categoryRepository->findAll();
        require __DIR__.'/../View/article/add.php';

    }

    public function delete($id) {
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager); 
        $article = $articleRepository->delete($id);

        header('Location: index.php?c=article&a=list');
       
    }

    public function update() {
        $id = $_GET['articleId'];
        $manager = new PDOManager();
        $articleRepository = new ArticleRepository($manager);
        $categoryRepository = new CategoryRepository($manager);

        $article = $articleRepository->findOneById($id);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $date = new DateTime('now');
            $article = new Article();
            $article->setId($id);
            $article->setTitle($_POST['title']);
            $article->setContent($_POST['content']);
            $article->setAuthor($_POST['author']);
            $article->setDate($date->format('Y-m-d H:i:s'));
            $article->setCategoryId($_POST['categoryId']);

            $articleRepository->update($article);
        }
        $categories = $categoryRepository->findAll();

        require __DIR__.'/../View/article/update.php';
    }
}
