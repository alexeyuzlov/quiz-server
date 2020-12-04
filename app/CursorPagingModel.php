<?php

namespace App;

class CursorPagingModel
{
    /**
     * @var int
     */
    public $lastValue;

    /**
     * @var int
     */
    public $pageSize;

    public $sort;

    public function __construct($request)
    {
        $this->sort = new SortModel($request['sort'] ?? null);

        $this->pageSize = $request['pageSize'] ?? 10;

        if (isset($request['lastValue'])) {
            $this->lastValue = $request['lastValue'];
        }
    }
}
