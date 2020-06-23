<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\AlwaysTrue;

class AlwaysTrueTest extends TestCase
{
    public function testAlwaysTrueDoesNotThrow():void
    {
        $this->assertTrue(true);
        $condition = new AlwaysTrue();
        $condition->check("abcdefg");
    }
}
