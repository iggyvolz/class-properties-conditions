<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\Any;
use iggyvolz\ClassProperties\Conditions\Matches;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class AnyTest extends TestCase
{
    public function testAnyMatches():void
    {
        $this->assertTrue(true);
        $condition = new Any(new Matches("/abc.+/"), new Matches("/def.+/"));
        $condition->check("abcdefg");
        $condition->check("defghij");
    }
    public function testAnyMatchesError():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("jib does not match /abc.+/, jib does not match /def.+/");
        $condition = new Any(new Matches("/abc.+/"), new Matches("/def.+/"));
        $condition->check("jib");
    }
    public function testEmptyAnyFails():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Empty Any will always fail");
        $condition = new Any();
        $condition->check("jib");
    }
}
