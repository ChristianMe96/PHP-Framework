<?php

namespace Entity;


class Entry
{
    /**
     * @var int
     */
    private $ID = 0;
    private $date = '';
    private $title = '';
    private $content = '';
    private $authorID = 0;
    private $commentCount = 0;
    private $author = '';
    private $comments = [];

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     * @return Entry
     */
    public function setComments(array $comments): Entry
    {
        $this->comments = $comments;
        return $this;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @return int
     */
    public function getCommentCount(): int
    {
        return $this->commentCount;
    }

    /**
     * @param int $commentCount
     * @return Entry
     */
    public function setCommentCount(int $commentCount): Entry
    {
        $this->commentCount = $commentCount;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Entry
     */
    public function setAuthor(string $author): Entry
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param int $ID
     * @return Entry
     */
    public function setID(int $ID): Entry
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $dateX
     * @return Entry
     */
    public function setDate(string $date): Entry
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Entry
     */
    public function setTitle(string $title): Entry
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Entry
     */
    public function setContent(string $content): Entry
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthorID(): int
    {
        return $this->authorID;
    }

    /**
     * @param int $authorID
     * @return Entry
     */
    public function setAuthorID(int $authorID): Entry
    {
        $this->authorID = $authorID;
        return $this;
    }


}