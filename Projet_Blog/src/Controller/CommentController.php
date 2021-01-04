<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CategorieRepository;
use App\Repository\CommentRepository;

use App\Services\DBManager\PDOManager;
use App\Model\Comment;
use DateTime;

class CommentController 
{
    public function list() {
        $manager = new PDOManager();
        $commentRepository = new CommentRepository($manager);
        $comments = $commentRepository->findAll();

        require __DIR__.'/../View/article/single.php';
    }

    public function add() {
        $manager = new PDOManager();
        $commentRepository = new CommentRepository($manager);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $date = new DateTime('now');
            $comment = new Comment();
            $comment->setArticleId($_POST['articleId']);
            $comment->setAuthor($_POST['author']);
            $comment->setComment($_POST['comment']);
            $comment->setDate($date->format('Y-m-d H:i:s'));

            $commentRepository->insert($comment);
        }
        require __DIR__.'/../View/article/single.php';

    }

    public function delete($commentId) {
        $manager = new PDOManager();
        $commentRepository = new CommentRepository($manager); 
        $comment = $commentRepository->delete($commentId); 
        
        header('Location: index.php?c=article&a=voir&articleId='.$_GET['articleId']);exit;
    }

    public function update() {
        $id = $_GET['commentId'];
        $manager = new PDOManager();
        $commentRepository = new commentRepository($manager);
        $comment = $commentRepository->findOneById($id);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $comment = new Comment();
            $comment->setCommentId($commentId);
            $comment->setArticleId($_POST['articleId']);
            $comment->setAuthor($_POST['author']);
            $comment->setComment($_POST['comment']);
            $comment->setDate($date->format('Y-m-d H:i:s'));

            $commentRepository->update($comment);
        }
        require __DIR__.'/../View/article/list.php';
    }
}
