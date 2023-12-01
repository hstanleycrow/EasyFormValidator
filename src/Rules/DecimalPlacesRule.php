<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class DecimalPlacesRule implements RuleInterface
{
    protected $decimals;

    public function __construct($decimals)
    {
        $this->decimals = $decimals;
    }

    public function passes($value): bool
    {
        return preg_match('/^\d+(\.\d{' . $this->decimals . '})?$/', $value);
    }

    public function message($attribute): string
    {
        return "$attribute must have exactly $this->decimals decimal places.";
    }
}
