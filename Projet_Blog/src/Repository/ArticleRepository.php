<?php

namespace App\Repository;

use App\Model\Article;
use App\Repository\ArticleRepository;
use App\Services\DBManager\DBManagerInterface;


class ArticleRepository
{
    private string $tableName='articles';
    private DBmanagerInterface $DBManager ;

    public function __construct(DBManagerInterface $DBManager){
        
        $this->DBManager = $DBManager;
    }

    public function findAll(): array {
        $results = $this->DBManager->findAll($this->tableName);
        $articles = [];

        foreach ($results as $result) {
            $article = $this->toObjet($result);
            $articles[] = $article;
        }
        return $articles;
    }


    public function findOneById(string $id): Article 
    {
        $result = $this->DBManager->findOneBy($this->tableName,'articleId', $id);

        $article = $this->toObjet($result);
        return $article;
    }

    public function insert(Article $article): void
    {
         $this->DBManager->insert($this->tableName, "(title, content, author, date, categoryId) 
              VALUES ('". $article->getTitle() ."', '". $article->getContent() ."', '". $article->getAuthor() ."', '". $article->getDate() ."', ".$article->getCategoryId().")");
    }

    public function delete($id): void
    {
        $this->DBManager->delete($this->tableName, 'articleId', $id);
    }

    public function update($article): void 
    {
        $this->DBManager->update($this->tableName, "
        title = '".$article->getTitle()."',
        content = '".$article->getContent()."',
        author = '".$article->getAuthor()."',
        date = '".$article->getDate()."',
        categoryId = ".$article->getCategoryId()."
        WHERE articleId = '".$article->getId()."'
        ");
    }

    private function toObjet($result): Article {

        $article = new Article();

        $article->setId($result['articleId'])
            ->setTitle($result['title'])
            ->setContent($result['content'])
            ->setAuthor($result['author'])
            ->setDate($result['date'])
            ->setCategoryId($result['categoryId']);


        return $article;       
    }
}

