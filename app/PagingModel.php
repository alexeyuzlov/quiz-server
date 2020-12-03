<?php

namespace App;

class PagingModel
{
    /**
     * @var int
     */
    public $page;

    /**
     * @var int
     */
    public $pageSize;

    public function __construct($pageModelData)
    {
        $this->page = $pageModelData['page'] ?? 1;
        $this->pageSize = $pageModelData['pageSize'] ?? 2;
    }
}
