<?php

namespace App;

class CursorPagingModel
{
    /**
     * @var CursorModel
     */
    public $cursor;

    /**
     * @var int
     */
    public $pageSize;

    /**
     * @var SortModel
     */
    public $sort;

    public function __construct($request)
    {
        $this->sort = new SortModel($request['sort'] ?? null);

        $this->pageSize = $request['pageSize'] ?? 10;

        if (isset($request['cursor'])) {
            $this->cursor = new CursorModel($request['cursor']);
        }
    }

    public function toResponse($response)
    {
        $model = null;

        if (empty($response)) {
            $model = null;
        } else if (count($response) <= $this->pageSize) {
            $model = null;
        } else $model = array_pop($response);

        return [
            'cursor' => $model ? $this->toCursor($model) : null,
            'data' => $this->sort->asc ? $response : array_reverse($response),
        ];
    }

    public function toCursor($model)
    {
        return new CursorModel([
            'nextId' => $model['id'],
            'nextValue' => $model[$this->sort->field]
        ]);
    }
}
