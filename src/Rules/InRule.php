<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class InRule implements RuleInterface
{
    protected $allowedValues;

    public function __construct($allowedValues)
    {
        $this->allowedValues = $allowedValues;
    }

    public function passes($value): bool
    {
        return in_array($value, $this->allowedValues);
    }

    public function message($attribute): string
    {
        $allowedValuesStr = implode(', ', $this->allowedValues);
        return "$attribute must be one of the following values: $allowedValuesStr.";
    }
}
