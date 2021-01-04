<?php

namespace App\Repository;

use App\Model\Comment;
use App\Repository\CommentRepository;
use App\Services\DBManager\DBManagerInterface;

class CommentRepository {

    private string $tableName='comments';
    private DBmanagerInterface $DBManager ;

    public function __construct(DBManagerInterface $DBManager){
        
        $this->DBManager = $DBManager;
    }


    public function findAll(): array {
        $results = $this->DBManager->findAll($this->tableName);
        $comments = [];

        foreach ($results as $result) {
            $comment = $this->toObjet($result);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function insert(comment $comment): void
    {
         $this->DBManager->insert($this->tableName, "(articleId, author, comment, date ) 
              VALUES (".$comment->getArticleId().", '". $comment->getAuthor() ."', '". $comment->getComment() ."', '". $comment->getDate() ."')");
    }

    public function delete($commentId): void
    {
        $this->DBManager->delete($this->tableName, 'commentId', $commentId);
    }

    public function update($comment): void 
    {
        $this->DBManager->update($this->tableName, "
        author = '".$comment->getAuthor()."',
        comment = '".$comment->getComment()."',
        date = '".$comment->getDate()."',
        commentId = ".$comment->getCommentId()."
        WHERE commentId = '".$comment->getCommentId()."'
        ");
    }


    private function toObjet($result): comment {

        $comment = new Comment();

        $comment->setCommentId($result['commentId'])
            ->setArticleId($result['articleId'])
            ->setAuthor($result['author'])
            ->setComment($result['comment'])
            ->setDate($result['date']);


        return $comment;       
    }


}
