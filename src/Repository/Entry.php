<?php

namespace Repository;


class Entry
{
    private $pdo;
    private $entryData = [];
    private $rowCount = 0;
    private $entryById = [];


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEntry($date, $title, $content, $authorId): void{
        $stmt = $this->pdo->prepare("INSERT INTO entries (date,title,content,authorID) VALUES (:date , :title , :content , :authorId)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':authorId', $authorId);
        $stmt->execute();
    }

    public function getEntry($limit): array {
        $entries = $this->pdo->prepare("
            SELECT entries.*, count(entries.ID) AS totalCount, if(comments.entryID IS NOT NULL, count(*),0) AS commentCount, users.username AS author
            FROM `entries`
            LEFT JOIN comments
            ON ( entries.ID = comments.entryID)
            LEFT JOIN users
            ON ( entries.authorID = users.ID)
            GROUP BY entries.ID
            ORDER BY date DESC 
            LIMIT :limit , 3
        ");
        $entries->bindParam(':limit', $limit, \PDO::PARAM_INT);
        $entries->execute();
        var_dump($entries->fetchObject('\Entity\Entry'));
        $this->entryData = $entries->fetchAll();

        return $this->entryData;
    }

    public function getRowCount(): int {
        $stmtCountRows = $this->pdo->query("SELECT count(ID) AS entryCount FROM entries");

        $this->rowCount = $stmtCountRows->fetch()['entryCount'];
        return $this->rowCount;
    }

    public function getEntryById($id) {
        $stmtEntry = $this->pdo->prepare("SELECT entries.*, users.username AS author
           FROM entries
           LEFT JOIN users ON (entries.authorID = users.ID)
           WHERE entries.ID = :id"
        );
        $stmtEntry->bindParam(':id',$id);
        $stmtEntry->execute();
        $this->entryById = $stmtEntry->fetch(\PDO::FETCH_ASSOC);
        return $this->entryById;
    }
}