<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\GreaterThan;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class GreaterThanTest extends TestCase
{
    public function testGreaterThan():void
    {
        $this->assertTrue(true);
        $condition = new GreaterThan(6);
        $condition->check(8);
    }
    public function testGreaterThanErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("6 is not greater than 8");
        $condition = new GreaterThan(8);
        $condition->check(6);
    }
    public function testComparisonInvalidInput():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Invalid type array, needed int|float");
        $condition = new GreaterThan(8);
        $condition->check([]);
    }
}
