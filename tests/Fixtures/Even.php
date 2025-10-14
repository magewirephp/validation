<?php

namespace Magewirephp\Validation\Tests;

use Magewirephp\Validation\Rule;

class Even extends Rule
{

    protected $message = "The :attribute must be even";

    public function check($value): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        return $value % 2 === 0;
    }
}
