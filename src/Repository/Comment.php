<?php

namespace Repository;

/**
 * Class Comment
 * @package Repository
 */
class Comment
{
    /**
     * @var
     */
    private $pdo;
    private $commentsByEntryId;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $id
     * @return array
     */
    public function getCommentsByEntryId($id): array{
        $stmtComment = $this->pdo->prepare("SELECT * FROM comments WHERE entryID = :id");
        $stmtComment->bindParam(':id', $id);
        $stmtComment->execute();

        $this->commentsByEntryId = $stmtComment->fetchAll(\PDO::FETCH_CLASS, '\Entity\Comment');

        return $this->commentsByEntryId;
    }

    /**
     * @param $name
     * @param $id
     * @param $comment
     * @param $date
     * @param $url
     * @param $mail
     */
    public function addComment($name, $id, $comment, $date, $url, $mail): void{
        $stmt = $this->pdo->prepare("INSERT INTO comments (user,entryID,comment,date,url,mail) VALUES (:name , :id , :comment , :date , :url , :mail )");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':comment', $comment);
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();
    }

}