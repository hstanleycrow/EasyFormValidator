<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class IntegerRule implements RuleInterface
{
    public function passes($value): bool
    {
        return is_int($value);
    }
    public function message($attribute): string
    {
        return "$attribute must be an integer.";
    }
}
