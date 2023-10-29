<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;


class RequiredRule implements RuleInterface
{
    public function passes($value): bool
    {
        return isset($value) && $value !== '';
    }
    public function message($attribute): string
    {
        return "$attribute is required.";
    }
}
