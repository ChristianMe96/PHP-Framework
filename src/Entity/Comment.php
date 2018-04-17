<?php

namespace Entity;


class Comment
{
    /**
     * @var int
     */
    private $ID = 0;
    private $user = '';
    private $entryID = 0;
    private $comment = '';
    private $date = '';
    private $url = '';
    private $mail = '';

    /**
     * @return int
     */
    public function getID(): int
    {
        return $this->ID;
    }

    /**
     * @param int $ID
     * @return Comment
     */
    public function setID(int $ID): Comment
    {
        $this->ID = $ID;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return Comment
     */
    public function setUser(string $user): Comment
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return int
     */
    public function getEntryID(): int
    {
        return $this->entryID;
    }

    /**
     * @param int $entryID
     * @return Comment
     */
    public function setEntryID(int $entryID): Comment
    {
        $this->entryID = $entryID;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Comment
     */
    public function setComment(string $comment): Comment
    {
        $this->comment = $comment;
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
     * @param string $date
     * @return Comment
     */
    public function setDate(string $date): Comment
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Comment
     */
    public function setUrl(string $url): Comment
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     * @return Comment
     */
    public function setMail(string $mail): Comment
    {
        $this->mail = $mail;
        return $this;
    }
}