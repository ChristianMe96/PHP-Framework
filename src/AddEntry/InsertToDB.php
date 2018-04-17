<?php

namespace AddEntry;
//umbenenen repository
//entitys injekten

use Check24Framework\DiContainer;
use Check24Framework\Request;
use Factory\Entry;

/**
 * Class InsertToDB
 * @package AddEntry
 */
class InsertToDB
{
    private $diContainer;

    public function __construct(DiContainer $diContainer)
    {
        $this->diContainer = $diContainer;
    }
    /**
     * @param Request $requestData
     */
    public function processBlogPost(Request $requestData): void{
        if (!empty($requestData->getFromPost('Text')) || !empty($requestData->getFromPost('Title')) || !empty($requestData->getFromPost('Date'))){
            $date = date('Y-m-d H:i:s');
            $title = $requestData->getFromPost('Title');
            $content = $requestData->getFromPost('Text');
            $authorId = $_SESSION['userId'];

            $entry = $this->diContainer->get('Repository\Entry');
            $entry->addEntry($date, $title, $content, $authorId);
        }
    }
}