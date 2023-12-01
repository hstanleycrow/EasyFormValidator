<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class GreaterThanZeroRule implements RuleInterface
{
    public function passes($value): bool
    {
        return $value > 0;
    }

    public function message($attribute): string
    {
        return "$attribute must be greater than zero.";
    }
}
