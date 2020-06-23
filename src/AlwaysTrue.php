<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;

<<Attribute(Attribute::TARGET_PROPERTY)>>
class AlwaysTrue extends Condition
{
    public function check($value):void
    {
    }
}