<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LengthAtMost;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LengthAtMostTest extends TestCase
{
    public function testLengthAtMost():void
    {
        $this->assertTrue(true);
        $condition = new LengthAtMost(6);
        $condition->check("123456");
    }
    public function testLeastErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '123456789' (9) is not less than or equal to 8");
        $condition = new LengthAtMost(8);
        $condition->check("123456789");
    }
}
