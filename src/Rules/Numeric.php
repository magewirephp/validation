<?php

namespace Rakit\Validation\Rules;

use Rakit\Validation\Rule;

// Note: 'numeric' (lowercase) is a soft reserved keyword and triggers PHPCompatibility warning
// Kept unchanged for compatibility with forked rakit/validation package
// see:
// - https://www.php.net/manual/en/reserved.other-reserved-words.php
// - https://github.com/illuminate/validation/blob/v12.34.0/Rules/Numeric.php

// phpcs:disable PHPCompatibility.Keywords.ForbiddenNames
class Numeric extends Rule
{

    /** @var string */
    protected $message = "The :attribute must be numeric";

    /**
     * Check the $value is valid
     *
     * @param mixed $value
     * @return bool
     */
    public function check($value): bool
    {
        return is_numeric($value);
    }
}
