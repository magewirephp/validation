<?php

namespace Magewirephp\Validation\Tests;

use Magewirephp\Validation\Rules\NotIn;
use PHPUnit\Framework\TestCase;

class NotInTest extends TestCase
{
    protected $rule;
    protected function setUp(): void
    {
        $this->rule = new NotIn;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->fillParameters(['2', '3', '4'])->check('1'));
        $this->assertTrue($this->rule->fillParameters([1, 2, 3])->check(5));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->fillParameters(['bar', 'baz', 'qux'])->check('bar'));
    }

    public function testStricts()
    {
        // Not strict
        $this->assertFalse($this->rule->fillParameters(['1', '2', '3'])->check(1));
        $this->assertFalse($this->rule->fillParameters(['1', '2', '3'])->check(true));

        // Strict
        $this->rule->strict();
        $this->assertTrue($this->rule->fillParameters(['1', '2', '3'])->check(1));
        $this->assertTrue($this->rule->fillParameters(['1', '2', '3'])->check(1));
    }
}
