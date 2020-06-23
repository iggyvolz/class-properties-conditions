<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\Attributes\ReadOnlyProperty;

<<Attribute(Attribute::TARGET_PROPERTY)>>
class All extends Condition
{
    /**
     * @var Condition[]
     */
    <<ReadOnlyProperty>>
    private array $Conditions;
    public function __construct(
        Condition ...$Conditions
    ) {
        $this->Conditions = $Conditions;
    }
    public function check($value):void
    {
        foreach($this->Conditions as $Condition) {
            $Condition->check($value);
        }
    }
}