<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 09.04.2018
 * Time: 10:46
 */

namespace Entity;


class EntryForDetailsPage
{
    /**
     * @var int
     */
    private $ID = 0;
    private $date = '';
    private $title = '';
    private $content = '';
    private $authorID = 0;
    private $author = '';

    /**
     * @return int
     */
    public function getAuthorID(): int
    {
        return $this->authorID;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     * @return EntryForDetailsPage
     */
    public function setDate(string $date): EntryForDetailsPage
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
     * @return EntryForDetailsPage
     */
    public function setTitle(string $title): EntryForDetailsPage
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
     * @return EntryForDetailsPage
     */
    public function setContent(string $content): EntryForDetailsPage
    {
        $this->content = $content;
        return $this;
    }
}