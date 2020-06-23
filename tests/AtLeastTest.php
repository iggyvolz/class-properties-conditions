<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\AtLeast;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class AtLeastTest extends TestCase
{
    public function testAtLeast():void
    {
        $this->assertTrue(true);
        $condition = new AtLeast(6);
        $condition->check(6);
    }
    public function testAtLeastErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("7 is not greater than or equal to 8");
        $condition = new AtLeast(8);
        $condition->check(7);
    }
}
