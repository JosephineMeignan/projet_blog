<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Controller\ArticleController;
use App\Controller\CategoryController;
use App\Controller\CommentController;
use App\Controller\ArticleClientController;


use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/../.env');


switch ($_GET['c'])  {
    case 'article':
        $articleController = new ArticleController();
        $categoryController = new CategoryController();
        $commentController = new CommentController();
        $articleClientController = new ArticleClientController();

        switch ($_GET['a']){
            case 'list':
                $articleController->list();
            break;
            case 'list-client':
                $articleClientController->list();
            break;

            case'voir';
                $articleController->single();
            break;

            case'voir-client';
                $articleClientController->single();
            break;

            case'add-article';
                $articleController->add();
            break;
            case'add-comment';
                $commentController->add();
            break;

            case'delete-article';
                $articleController->delete($_POST['articleId']);
            break;

            case'delete-category';
                $categoryController->delete($_POST['categoryId']);
            break;

            case'delete-comment';
                $commentController->delete($_POST['commentId']);
            break;
            
            case'update';
                $articleController->update();
            break;
        }
    break;
    

    case 'category':
        $categoryController = new CategoryController();
        switch ($_GET['a']){
            case 'list':
                $categoryController->list();
            break;

            case'add';
                $categoryController->add();
            break;

            case'delete';
                $categoryController->delete($_POST['categoryId']);
            break;
            
            case'update';
                $categoryController->update();
            break;
        }
    break;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


