<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LessThan;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LessThanTest extends TestCase
{
    public function testLessThan():void
    {
        $this->assertTrue(true);
        $condition = new LessThan(8);
        $condition->check(6);
    }
    public function testLessThanErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("8 is not less than 6");
        $condition = new LessThan(6);
        $condition->check(8);
    }
}
