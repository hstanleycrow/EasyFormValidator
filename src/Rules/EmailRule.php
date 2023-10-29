<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class EmailRule implements RuleInterface
{
    public function passes($value): bool
    {
        // Utiliza la función filter_var con el filtro FILTER_VALIDATE_EMAIL para validar un email.
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public function message($attribute): string
    {
        return "$attribute must be a valid email address.";
    }
}
