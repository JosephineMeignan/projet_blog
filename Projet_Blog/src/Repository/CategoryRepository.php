<?php

namespace App\Repository;

use App\Model\Category;
use App\Repository\CategoryRepository;
use App\Services\DBManager\DBManagerInterface;


class CategoryRepository
{
    private string $tableName='category';
    private DBmanagerInterface $DBManager ;

    public function __construct(DBManagerInterface $DBManager){
        
        $this->DBManager = $DBManager;
    }

    public function findAll(): array {
        $results = $this->DBManager->findAll($this->tableName);
        $categories = [];

        foreach ($results as $result) {
            $category = $this->toObjet($result);
            $categories[] = $category;
        }
        return $categories;
    }


    public function findOneById(string $id): category 
    {
        $result = $this->DBManager->findOneBy($this->tableName,'categoryId', $id);

        $category = $this->toObjet($result);
        return $category;
    }

    public function insert(category $category): void
    {
         $this->DBManager->insert($this->tableName, "(categoryName) 
              VALUES ('". $category->getName() ."')");
    }

    public function delete($id): void
    {
        $this->DBManager->delete($this->tableName, 'categoryId', $id);
    }

    public function update($category): void 
    {
        $this->DBManager->update($this->tableName, "
        categoryName = '".$category->getName()."'
        WHERE categoryId = '".$category->getId()."'
        ");
    }

    private function toObjet($result): category {

        $category = new Category();

        $category->setId($result['categoryId'])
            ->setName($result['categoryName']);

        return $category;       
    }
}

