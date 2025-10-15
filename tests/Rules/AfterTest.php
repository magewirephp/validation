<?php

namespace Rakit\Validation\Tests;

use Rakit\Validation\Rules\After;
use PHPUnit\Framework\TestCase;
use DateTime;

class AfterTest extends TestCase
{

    /**
     * @var \Rakit\Validation\Rules\After
     */
    protected $validator;

    protected function setUp(): void
    {
        $this->validator = new After();
    }

    /**
     * @dataProvider getValidDates
     */
    public function testOnlyAWellFormedDateCanBeValidated($date)
    {
        $this->assertTrue(
            $this->validator->fillParameters(["3 years ago"])->check($date)
        );
    }

    /**
     * @dataProvider getInvalidDates
     */
    public function testANonWellFormedDateCannotBeValidated($date)
    {
        $this->expectException(\Exception::class);
        $this->validator->fillParameters(["tomorrow"])->check($date);
    }

    public function testUserProvidedParamCannotBeValidatedBecauseItIsInvalid()
    {
        $this->expectException(\Exception::class);
        $this->validator->fillParameters(["to,morrow"])->check("now");
    }

    public function getInvalidDates()
    {
        $now = new DateTime();

        return [
            [12], //12 instead of 2012
            ["09"], //like '09 instead of 2009
            [$now->format("Y m d")],
            [$now->format("Y m d h:i:s")],
            ["tommorow"], //typo
            ["lasst year"] //typo
        ];
    }

    public function getValidDates()
    {
        $now = new DateTime();

        return [
            [2016],
            [$now->format("Y-m-d")],
            [$now->format("Y-m-d h:i:s")],
            ["now"],
            ["tomorrow"],
            ["2 years ago"]
        ];
    }

    public function testProvidedDateFailsValidation()
    {

        $now = (new DateTime("today"))->format("Y-m-d");
        $today = "today";

        $this->assertFalse(
            $this->validator->fillParameters(['tomorrow'])->check($now)
        );

        $this->assertFalse(
            $this->validator->fillParameters(['tomorrow'])->check($today)
        );
    }
}
