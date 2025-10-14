<?php

namespace Magewirephp\Validation\Tests;

use Magewirephp\Validation\Rules\AlphaNum;
use PHPUnit\Framework\TestCase;

class AlphaNumTest extends TestCase
{
    protected $rule;
    protected function setUp(): void
    {
        $this->rule = new AlphaNum;
    }

    public function testValids()
    {
        $this->assertTrue($this->rule->check('123'));
        $this->assertTrue($this->rule->check('abc'));
        $this->assertTrue($this->rule->check('123abc'));
        $this->assertTrue($this->rule->check('abc123'));
    }

    public function testInvalids()
    {
        $this->assertFalse($this->rule->check('foo 123'));
        $this->assertFalse($this->rule->check('123 foo'));
        $this->assertFalse($this->rule->check(' foo123 '));
    }
}
