<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\Attributes\ReadOnlyProperty;

@@Attribute(Attribute::TARGET_PROPERTY)
class LengthGreaterThan extends LengthComparison
{

    public function __construct(
        float|int $checkValue,
    ) {
        parent::__construct($checkValue, Comparison::GREATER);
    }
}