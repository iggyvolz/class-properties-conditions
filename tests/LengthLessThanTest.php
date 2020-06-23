<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LengthLessThan;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LengthLessThanTest extends TestCase
{
    public function testLengthLessThan():void
    {
        $this->assertTrue(true);
        $condition = new LengthLessThan(8);
        $condition->check("123456");
    }
    public function testLessThanErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '12345678' (8) is not less than 6");
        $condition = new LengthLessThan(6);
        $condition->check("12345678");
    }
}
