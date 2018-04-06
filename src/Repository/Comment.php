<?php

namespace Repository;


class Comment
{
    private $pdo;
    private $commentsByEntryId;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getCommentsByEntryId($id){
        $stmtComment = $this->pdo->prepare("SELECT * FROM comments WHERE entryID = :id");
        $stmtComment->bindParam(':id', $id);
        $stmtComment->execute();

        $this->commentsByEntryId = $stmtComment->fetchAll();
        return $this->commentsByEntryId;
    }

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