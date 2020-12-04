<?php

namespace App;

class SortModel
{
    /**
     * @var string
     */
    public $field;

    /**
     * @var bool
     */
    public $asc;

    public function __construct($data)
    {
        if (!isset($data)) {
            $this->field = 'id';
            $this->asc = true;
            return;
        }

        $this->field = $data['field'];
        $this->asc = $data['asc'];
    }

    public function direction() {
        return $this->asc ? 'asc' : 'desc';
    }
}
