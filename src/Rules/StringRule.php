<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;


class StringRule implements RuleInterface
{

    public function passes($value): bool
    {
        return is_string($value);
    }
    public function message($attribute): string
    {
        return "$attribute must be a string.";
    }
}
