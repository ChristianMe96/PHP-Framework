<?php

namespace Entity;


class Entry
{
    private int $ID = 0;

    private string $date = '';

    private string $title = '';

    private string $content = '';

    private int $authorID = 0;

    private int $commentCount = 0;

    private string $author = '';

    private array $comments = [];

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setComments(array $comments): Entry
    {
        $this->comments = $comments;
        return $this;
    }

    public function getID(): int
    {
        return $this->ID;
    }

    public function getCommentCount(): int
    {
        return $this->commentCount;
    }

    public function setCommentCount(int $commentCount): Entry
    {
        $this->commentCount = $commentCount;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Entry
    {
        $this->author = $author;
        return $this;
    }

    public function setID(int $ID): Entry
    {
        $this->ID = $ID;
        return $this;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function setDate(string $date): Entry
    {
        $this->date = $date;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Entry
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Entry
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthorID(): int
    {
        return $this->authorID;
    }

    public function setAuthorID(int $authorID): Entry
    {
        $this->authorID = $authorID;
        return $this;
    }
}
