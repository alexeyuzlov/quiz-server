<?php

namespace App;

class CursorModel
{
    /**
     * @var int
     */
    public $nextId;

    /**
     * @var mixed
     */
    public $nextValue;

    public function __construct($data)
    {
        $this->nextId = $data['nextId'];
        $this->nextValue = $data['nextValue'];
    }
}
