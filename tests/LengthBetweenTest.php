<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LengthBetween;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LengthBetweenTest extends TestCase
{
    public function testLengthBetweenInclusive():void
    {
        $this->assertTrue(true);
        $condition = new LengthBetween(6, 8, true);
        $condition->check("123456");
        $condition->check("1234567");
        $condition->check("12345678");
    }
    public function testLengthBetweenInclusiveErrorsLower():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '12345' (5) is not greater than or equal to 6");
        $condition = new LengthBetween(6, 8, true);
        $condition->check("12345");
    }
    public function testLengthBetweenInclusiveErrorsHigher():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '123456789' (9) is not less than or equal to 8");
        $condition = new LengthBetween(6, 8, true);
        $condition->check("123456789");
    }
    public function testLengthBetweenExclusive():void
    {
        $this->assertTrue(true);
        $condition = new LengthBetween(6, 8, false);
        $condition->check("1234567");
    }
    public function testLengthBetweenExclusiveErrorsLower():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '123456' (6) is not greater than 6");
        $condition = new LengthBetween(6, 8, false);
        $condition->check("123456");
    }
    public function testLengthBetweenExclusiveErrorsHigher():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '12345678' (8) is not less than 8");
        $condition = new LengthBetween(6, 8, false);
        $condition->check("12345678");
    }
}
