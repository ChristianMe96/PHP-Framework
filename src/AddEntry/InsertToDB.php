<?php

namespace AddEntry;
//umbenenen repository
//entitys injekten

use Check24Framework\Request;
use Factory\Entry;

class InsertToDB
{
    public function processBlogPost(Request $requestData, \PDO $pdo){
        if (!empty($requestData->getFromPost('Text')) || !empty($requestData->getFromPost('Title')) || !empty($requestData->getFromPost('Date'))){
            $date = date('Y-m-d H:i:s');
            $title = $requestData->getFromPost('Title');
            $content = $requestData->getFromPost('Text');
            $authorId = $_SESSION['userId'];

            $entry = Entry::create();
            $entry->addEntry($date, $title, $content, $authorId);
        }
    }
}