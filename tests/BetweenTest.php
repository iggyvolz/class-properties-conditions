<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\Between;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class BetweenTest extends TestCase
{
    public function testBetweenInclusive():void
    {
        $this->assertTrue(true);
        $condition = new Between(6, 8, true);
        $condition->check(6);
        $condition->check(7);
        $condition->check(8);
    }
    public function testBetweenInclusiveErrorsLower():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("5 is not greater than or equal to 6");
        $condition = new Between(6, 8, true);
        $condition->check(5);
    }
    public function testBetweenInclusiveErrorsHigher():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("9 is not less than or equal to 8");
        $condition = new Between(6, 8, true);
        $condition->check(9);
    }
    public function testBetweenExclusive():void
    {
        $this->assertTrue(true);
        $condition = new Between(6, 8, false);
        $condition->check(7);
    }
    public function testBetweenExclusiveErrorsLower():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("6 is not greater than 6");
        $condition = new Between(6, 8, false);
        $condition->check(6);
    }
    public function testBetweenExclusiveErrorsHigher():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("8 is not less than 8");
        $condition = new Between(6, 8, false);
        $condition->check(8);
    }
}
