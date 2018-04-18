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

        return $stmtComment->fetchAll(\PDO::FETCH_CLASS, '\Entity\Comment');
    }

    /**
     * @param int $entryId
     * @param \Entity\Comment $comment
     */
    public function addComment(int $entryId, \Entity\Comment $comment): void{
        $stmt = $this->pdo->prepare("INSERT INTO comments (user,entryID,comment,date,url,mail) VALUES (:name , :id , :comment , :date , :url , :mail )");
        $stmt->bindValue(':name', $comment->getUser());
        $stmt->bindValue(':id', $entryId);
        $stmt->bindValue(':comment', $comment->getComment());
        $stmt->bindValue(':date', $comment->getDate());
        $stmt->bindValue(':url', $comment->getUrl());
        $stmt->bindValue(':mail', $comment->getMail());
        $stmt->execute();
    }

}