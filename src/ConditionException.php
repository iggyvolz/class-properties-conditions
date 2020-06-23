<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use InvalidArgumentException;

class ConditionException extends InvalidArgumentException
{
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}