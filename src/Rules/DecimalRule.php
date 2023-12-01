<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class DecimalRule implements RuleInterface
{
    public function passes($value): bool
    {
        return is_numeric($value) && floor($value) != $value;
    }

    public function message($attribute): string
    {
        return "$attribute must be a decimal number.";
    }
}
