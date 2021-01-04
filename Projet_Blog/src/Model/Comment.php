<?php

namespace App\Model;

class Comment {
    private int $commentId;
    private int $articleId;
    private string $author;
    private string $comment;
    private string $date;


    public function getCommentId(): int {
        return $this->commentId;
    }

    public function setCommentId (int $commentId) {
        $this->commentId = $commentId;
        return $this;
    }

    public function getArticleId(): int {
        return $this->articleId;
    }

    public function setArticleId(int $articleId) {
        $this->articleId = $articleId;
        return $this;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function setAuthor(string $author) {
        $this->author = $author;
        return $this;
    }

    public function getComment(): string {
        return $this->comment;
    }

    public function setComment(string $comment) {
        $this->comment = $comment;
        return $this;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date) {
        $this->date = $date;
        return $this;
    }

}
