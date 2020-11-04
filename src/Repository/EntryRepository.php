<?php

namespace Repository;


use Entity\Comment;
use Entity\Entry;
use Entity\EntryCount;
use PDO;

class EntryRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addEntry(int $authorId, Entry $entry): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO entries (date,title,content,authorID) VALUES (:date , :title , :content , :authorId)");
        $stmt->bindValue(':date', $entry->getDate());
        $stmt->bindValue(':title', $entry->getTitle());
        $stmt->bindValue(':content', $entry->getContent());
        $stmt->bindValue(':authorId', $authorId);
        $stmt->execute();
    }

    /**
     * @return Entry[]
     */
    public function getEntry(int $limit): array
    {
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
        $entries->bindParam(':limit', $limit, PDO::PARAM_INT);
        $entries->execute();

        return $entries->fetchAll(PDO::FETCH_CLASS, Entry::class);
    }

    public function getRowCount(): ?EntryCount
    {
        $stmtCountRows = $this->pdo->query("SELECT count(ID) AS entryCount FROM entries");
        if (!$stmtCountRows) {
            return null;
        }
        return $stmtCountRows->fetchObject(EntryCount::class);
    }

    public function getEntryById(int $id): self
    {
        $stmtEntry = $this->pdo->prepare("
            SELECT entries.*, users.username AS author
           FROM entries
           LEFT JOIN users ON (entries.authorID = users.ID)
           WHERE entries.ID = :id"
        );
        $stmtEntry->bindParam(':id', $id);
        $stmtEntry->execute();
        $entryById = $stmtEntry->fetchObject(EntryRepository::class);

        $stmtComment = $this->pdo->prepare("SELECT * FROM comments WHERE entryID = :ID");
        $stmtComment->bindParam(':ID', $id);
        $stmtComment->execute();

        $comments = $stmtComment->fetchAll(PDO::FETCH_CLASS, Comment::class);
        $entryById->setComments($comments);

        return $entryById;
    }
}
