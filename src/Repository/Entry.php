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
     * @param $date
     * @param $title
     * @param $content
     * @param $authorId
     */
    public function addEntry($date, $title, $content, $authorId): void{
        $stmt = $this->pdo->prepare("INSERT INTO entries (date,title,content,authorID) VALUES (:date , :title , :content , :authorId)");
        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':authorId', $authorId);
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

        $this->entryData = $entries->fetchAll(\PDO::FETCH_CLASS, '\Entity\Entry');

        /*
        $IDs = [];
        foreach ($this->entryData as $data){
            array_push($IDs, $data->getID());
        }
        #var_dump($IDs);
        $stmtComment = $this->pdo->prepare("SELECT entries.ID, comments.* FROM `entries` LEFT JOIN comments ON ( entries.ID = comments.entryID) WHERE entryID = 27 OR entryID = 26 OR entryID = 25");

        $stmtComment->bindParam(':entryOne', $IDs[0]);
        $stmtComment->bindParam(':entryTwo', $IDs[1]);
        $stmtComment->bindParam(':entryThree', $IDs[2]);
        $stmtComment->execute();

        $comments = $stmtComment->fetchAll(\PDO::FETCH_CLASS, '\Entity\Comment');


        $commentsForEntry = [];
        foreach ($this->entryData as $i => $entry){
            foreach ($comments as $j => $comment){
                if ($entry->getID() === $comment->getEntryID()){
                    array_push($commentsForEntry, $comment);
                }
            }

        }
        */

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