<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 26.03.2018
 * Time: 13:26
 */

namespace Entity;


class Comment
{
    /**
     * @var int
     */
    private $id = 0;
    private $user = '';
    private $entryId = 0;
    private $comment = '';
    private $date = '';
    private $url = '';
    private $mail = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
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
    public function getEntryId(): int
    {
        return $this->entryId;
    }

    /**
     * @param int $entryId
     * @return Comment
     */
    public function setEntryId(int $entryId): Comment
    {
        $this->entryId = $entryId;
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