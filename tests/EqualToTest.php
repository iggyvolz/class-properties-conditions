<?php

namespace iggyvolz\ClassProperties\tests;

use PHPUnit\Framework\TestCase;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\Conditions\EqualTo;
use iggyvolz\ClassProperties\Attributes\Property;
use iggyvolz\ClassProperties\Attributes\Identifier;
use iggyvolz\ClassProperties\Conditions\ConditionException;

class EqualToTest extends TestCase
{
    public function testEqualTo():void
    {
        $this->assertTrue(true);
        $condition = new EqualTo("abcdefg");
        $condition->check("abcdefg");
    }
    public function testEqualToErrors():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("abcdefg is not equal to qwerty");
        $condition = new EqualTo("abcdefg");
        $condition->check("qwerty");
    }
    public function testEqualToErrorsWithDifferingTypes():void
    {
        $this->expectException(ConditionException::class);
        $this->expectExceptionMessage("Invalid type int, needed string");
        $condition = new EqualTo("abcdefg");
        $condition->check(57);
    }
    public function testEqualIdentifiable():void
    {
        $this->assertTrue(true);
        $condition = new EqualTo(new BaseIdentifiable(57));
        $condition->check(57);
        $condition->check(new BaseIdentifiable(57));
    }
}
class BaseIdentifiable extends Identifiable
{
    @@Identifier
    @@Property
    private int $identifier;
    public function __construct(
        int $identifier
    ) {
        $this->identifier = $identifier;
    }
    public static function getFromIdentifier($identifier): ?self
    {
        if(is_int($identifier)) {
            return new self($identifier);
        } else {
            return null;
        }
    }
}