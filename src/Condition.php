<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\ClassProperties;

abstract class Condition implements PreSet
{
    public function runPreSetHook(ClassProperties $target, string $property, &$value): void
    {
        if(!is_null($value)) {
            $this->check($value);
        }
    }
    abstract public function check($value):void;
}