<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LengthGreaterThan;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LengthGreaterThanTest extends TestCase
{
    public function testLengthGreaterThan():void
    {
        $this->assertTrue(true);
        $condition = new LengthGreaterThan(6);
        $condition->check("12345678");
    }
    public function testLeastErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '123456' (6) is not greater than 8");
        $condition = new LengthGreaterThan(8);
        $condition->check("123456");
    }
    public function testLengthComparisonInvalidInput():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Invalid type array, needed string");
        $condition = new LengthGreaterThan(8);
        $condition->check([]);
    }
}
