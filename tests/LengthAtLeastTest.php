<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\LengthAtLeast;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class LengthAtLeastTest extends TestCase
{
    public function testLengthAtLeast():void
    {
        $this->assertTrue(true);
        $condition = new LengthAtLeast(6);
        $condition->check("123456");
    }
    public function testLeastErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Length of '1234567' (7) is not greater than or equal to 8");
        $condition = new LengthAtLeast(8);
        $condition->check("1234567");
    }
}
