<?php

namespace Repository;


use Entity\EntryCount;
use Entity\EntryForDetailsPage;

/**
 * Class Entry
 * @package Repository
 */
class Entry
{
    /**
     * @var
     */
    private $pdo;
    private $entryData = [];
    private $rowCount = 0;
    private $entryById = [];


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param int $authorId
     * @param \Entity\Entry $entry
     */
    public function addEntry(int $authorId, \Entity\Entry $entry): void{
        $stmt = $this->pdo->prepare("INSERT INTO entries (date,title,content,authorID) VALUES (:date , :title , :content , :authorId)");
        $stmt->bindValue(':date', $entry->getDate());
        $stmt->bindValue(':title', $entry->getTitle());
        $stmt->bindValue(':content', $entry->getContent());
        $stmt->bindValue(':authorId', $authorId);
        $stmt->execute();
    }

    /**
     * @param $limit
     * @return array
     */
    public function getEntry($limit) : array {
        $entries = $this->pdo->prepare("
            SELECT entries.* , if(comments.entryID IS NOT NULL, count(*),0) AS commentCount, users.username AS author
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

        $this->entryData = $entries->fetchAll(\PDO::FETCH_CLASS, \Entity\Entry::class);

        return $this->entryData;
    }

    /**
     * @return EntryCount
     */
    public function getRowCount(): EntryCount {
        $stmtCountRows = $this->pdo->query("SELECT count(ID) AS entryCount FROM entries");
        $this->rowCount = $stmtCountRows->fetchObject('\Entity\EntryCount');
        return $this->rowCount;
    }

    /**
     * @param $id
     * @return \Entity\Entry
     */
    public function getEntryById($id) : \Entity\Entry{
        $stmtEntry = $this->pdo->prepare("SELECT entries.*, users.username AS author
           FROM entries
           LEFT JOIN users ON (entries.authorID = users.ID)
           WHERE entries.ID = :id"
        );
        $stmtEntry->bindParam(':id',$id);
        $stmtEntry->execute();
        $this->entryById = $stmtEntry->fetchObject('\Entity\Entry');

        $stmtComment = $this->pdo->prepare("SELECT * FROM comments WHERE entryID = :ID");
        $stmtComment->bindParam(':ID', $id);
        $stmtComment->execute();

        $comments = $stmtComment->fetchAll(\PDO::FETCH_CLASS, '\Entity\Comment');
        $this->entryById->setComments($comments);

        return $this->entryById;
    }
}