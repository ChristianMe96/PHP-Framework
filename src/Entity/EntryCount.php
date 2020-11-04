<?php
/**
 * Created by PhpStorm.
 * User: christian.meinhard
 * Date: 09.04.2018
 * Time: 10:58
 */

namespace Entity;


class EntryCount
{
    private int $entryCount = 0;

    /**
     * @return int
     */
    public function getEntryCount(): int
    {
        return $this->entryCount;
    }
}
