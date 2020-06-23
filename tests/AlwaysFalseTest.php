<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\ClassProperties;
use iggyvolz\ClassProperties\Attributes\Property;
use iggyvolz\ClassProperties\Conditions\AlwaysFalse;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class AlwaysFalseTest extends TestCase
{
    public function testAlwaysFalseThrows():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Always fails");
        $condition = new AlwaysFalse();
        $condition->check("abcdefg");
    }
    public function testBypassedOnNull():void
    {
        $this->assertTrue(true);
        $dummy = new class extends ClassProperties {
            <<Property>>
            <<AlwaysFalse>>
            private ?int $foo; // Will only accept null
        };
        $dummy->foo = null; // AlwaysFails is bypassed
    }
    public function testNotBypassedOnNonNull():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Always fails");
        $dummy = new class extends ClassProperties {
            <<Property>>
            <<AlwaysFalse>>
            private ?int $foo; // Will only accept null
        };
        $dummy->foo = 7; // AlwaysFails is not bypassed
    }
}