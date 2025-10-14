<?php

namespace Magewirephp\Validation\Tests;

use Magewirephp\Validation\Rule;

class Required extends Rule
{

    public function check($value): bool
    {
        return true;
    }
}
