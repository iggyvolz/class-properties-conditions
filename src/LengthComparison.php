<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;
use TypeError;
use LogicException;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\Attributes\ReadOnlyProperty;

@@Attribute(Attribute::TARGET_PROPERTY)
class LengthComparison extends Condition
{
    public function __construct(
        @@ReadOnlyProperty
            private int $checkValue,
        @@ReadOnlyProperty
            private int $checks
    ) {
        $this->checks &= Comparison::LESS | Comparison::EQUAL | Comparison::GREATER;
    }
    public function check($value): void
    {
        if(!is_string($value)) {
            throw new ConditionException("Invalid type ".get_debug_type($value).", needed string");
        }
        // $result = match($value <=> $this->checkValue) {
        //     -1 => Comparison::LESS,
        //     0 => Comparison::EQUAL,
        //     1 => Comparison::GREATER
        // };
        switch(strlen($value) <=> $this->checkValue) {
            case -1: $result = Comparison::LESS; break;
            case 0: $result = Comparison::EQUAL; break;
            case 1: $result = Comparison::GREATER; break;
            // Not possible
            // @codeCoverageIgnoreStart
            default: throw new LogicException();
            // @codeCoverageIgnoreEnd
        }
        if(!($this->checks & $result)) {
            $comparison = Comparison::getCheckType($this->checks);
            throw new ConditionException("Length of '$value' (".strlen($value).") is not $comparison ".$this->checkValue);
        }
    }
}