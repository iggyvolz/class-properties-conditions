<?php

declare(strict_types=1);

namespace iggyvolz\ClassProperties\Conditions;

use Attribute;
use iggyvolz\ClassProperties\Hooks\PreSet;
use iggyvolz\ClassProperties\Identifiable;
use iggyvolz\ClassProperties\Attributes\ReadOnlyProperty;

<<Attribute(Attribute::TARGET_PROPERTY)>>
class Any extends Condition
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
        $exceptions = [];
        foreach($this->Conditions as $Condition) {
            try {
                $Condition->check($value);
                return;
            } catch(ConditionException $e) {
                $exceptions[] = $e->getMessage();
            }
        }
        if(empty($exceptions)) {
            throw new ConditionException("Empty Any will always fail");
        } else {
            throw new ConditionException(implode(", ", $exceptions));
        }
    }
}