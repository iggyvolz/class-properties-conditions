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
class Comparison extends Condition
{
    public const LESS = 1 << 0;
    public const EQUAL = 1 << 1;
    public const GREATER = 1 << 2;
    public function __construct(
        @@ReadOnlyProperty
            private float|int $checkValue,
        @@ReadOnlyProperty
            private int $checks
    ) {
        $this->checks &= self::LESS | self::EQUAL | self::GREATER;
    }
    public function check($value): void
    {
        if(!is_int($value) && !is_float($value)) {
            throw new ConditionException("Invalid type ".get_debug_type($value).", needed int|float");
        }
        $result = match($value <=> $this->checkValue) {
            -1 => self::LESS,
            0 => self::EQUAL,
            1 => self::GREATER
        };
        $comparison = self::getCheckType($this->checks);
        if(!($this->checks & $result)) {
            throw new ConditionException($value. " is not $comparison ".$this->checkValue);
        }
    }
    public static function getCheckType(int $type)
    {
        return match($type) {
            self::GREATER => "greater than",
            self::EQUAL => "equal to",
            self::GREATER | self::EQUAL => "greater than or equal to",
            self::LESS => "less than",
            self::LESS | self::GREATER => "unequal to",
            self::LESS | self::EQUAL => "less than or equal to",
            default => "(nonsensical comparision ".$this->checks.")"
        };
    }
}