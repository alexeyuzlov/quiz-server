<?php

namespace App\Rules;

use Illuminatech\Validation\Composite\CompositeRule;

class DbIdRule extends CompositeRule
{
    protected function rules(): array
    {
        return ['integer', 'min:1'];
    }
}
