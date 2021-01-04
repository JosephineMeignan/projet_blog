<?php

namespace App\Model;

class  Article {
    private int    $id;
    private string $title;
    private string $content;
    private string $author;
    private string $date;
    private ?int $categoryId;
    // private string $img;

    public function getId(): int {
        return $this->id;
    }

    public function setId (int $id): Article {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function setTitle(string $title): Article {
        $this->title = $title;
        return $this;
    }


    public function getContent(): string {
        return $this->content;
    }

    public function setContent(string $content) {
        $this->content = $content;
        return $this;
    }

    public function getAuthor(): string {
        return $this->author;
    }

    public function setAuthor(string $author) {
        $this->author = $author;
        return $this;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date) {
        $this->date = $date;
        return $this;
    }

    public function getCategoryId(): ?int {
        return $this->categoryId;
    }

    public function setCategoryId (?int $categoryId): Article {
        $this->categoryId = $categoryId;
        return $this;
    }

    // public function getImg(): string {
    //     return $this->img;
    // }

    // public function setImg(string $img): Article {
    //     $this->img = $img;
    //     return $this;
    // }
}
