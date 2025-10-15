<?php

namespace Rakit\Validation\Tests;

use Rakit\Validation\Rules\Alpha;
use PHPUnit\Framework\TestCase;
use stdClass;

class AlphaTest extends TestCase
{
    protected $rule;
    protected function setUp(): void
    {
        $this->rule = new Alpha;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check('foo'));
        $this->assertTrue($this->rule->check('foobar'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check(2));
        $this->assertFalse($this->rule->check([]));
        $this->assertFalse($this->rule->check(new stdClass));
        $this->assertFalse($this->rule->check('123asd'));
        $this->assertFalse($this->rule->check('asd123'));
        $this->assertFalse($this->rule->check('foo123bar'));
        $this->assertFalse($this->rule->check('foo bar'));
    }
}
