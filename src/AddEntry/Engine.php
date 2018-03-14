<?php

namespace AddEntry;


use Check24Framework\Request;

class Engine
{


    public function processBlogPost(Request $requestData){
        if (!empty($requestData->getFromPost('Text')) || !empty($requestData->getFromPost('Title')) || !empty($requestData->getFromPost('Date'))){
            $mysql = new \mysqli('localhost', 'root', '', 'blog');
            $date = $requestData->getFromPost('Date');
            $title = $requestData->getFromPost('Title');
            $content = $requestData->getFromPost('Text');
            $authorId = $_SESSION['userId'];
            $query = $mysql->query("INSERT INTO entries (date,title,content,authorID) VALUES ('$date','$title','$content','$authorId')");
        }
    }
}