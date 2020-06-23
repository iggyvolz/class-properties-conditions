<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Conditions\Matches;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class MatchesTest extends TestCase
{
    public function testMatches():void
    {
        $this->assertTrue(true);
        $condition = new Matches("/abc.+/");
        $condition->check("abcdefg");
    }
    public function testMatchesErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("qwerty does not match /abc.+/");
        $condition = new Matches("/abc.+/");
        $condition->check("qwerty");
    }
    public function testMatchesWithoutString():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Invalid type array, needed string");
        $condition = new Matches("/abc.+/");
        $condition->check([]);
    }
}
