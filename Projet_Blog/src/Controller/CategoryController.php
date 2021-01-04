<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Services\DBManager\PDOManager;
use App\Model\Category;


class CategoryController 
{
    public function list() {
        $manager = new PDOManager();
        $categoryRepository = new CategoryRepository($manager);
        $categories = $categoryRepository->findAll();

        require __DIR__.'/../View/article/list.php';
    }

    public function add() {
        $manager = new PDOManager();
        $categoryRepository = new CategoryRepository($manager);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $category = new Category();
            $category->setName($_POST['categoryName']);


            $categoryRepository->insert($category);
        }
        require __DIR__.'/../View/category/add.php';


    }

    public function delete($id) {
        $manager = new PDOManager();
        $categoryRepository = new CategoryRepository($manager); 
        $category = $categoryRepository->delete($id);

        header('Location: index.php?c=article&a=list');
       
    }

    public function update() {
        $id = $_GET['categoryId'];
        $manager = new PDOManager();
        $categoryRepository = new CategoryRepository($manager);
        $category = $categoryRepository->findOneById($id);

        if ($_SERVER['REQUEST_METHOD']=== 'POST') {
            $category = new Category();
            $category->setId($id);
            $category->setName($_POST['categoryName']);

            $categoryRepository->update($category);
        }
        require __DIR__.'/../View/category/update.php';
    }
}
