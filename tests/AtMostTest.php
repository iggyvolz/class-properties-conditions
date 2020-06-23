<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\AtMost;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class AtMostTest extends TestCase
{
    public function testAtMost():void
    {
        $this->assertTrue(true);
        $condition = new AtMost(6);
        $condition->check(6);
    }
    public function testAtMostErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("9 is not less than or equal to 8");
        $condition = new AtMost(8);
        $condition->check(9);
    }
}
