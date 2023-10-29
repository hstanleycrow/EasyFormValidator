<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class PhoneNumberRule implements RuleInterface
{
    public function passes($value): bool
    {
        // Elimina espacios en blanco y guiones para simplificar la validación.
        $value = str_replace([' ', '-'], '', $value);

        // Utiliza una expresión regular para validar números de teléfono en un formato común.
        return preg_match('/^\+?[0-9]{6,15}$/', $value); // === 1;
    }

    public function message($attribute): string
    {
        return "$attribute must be a valid phone number.";
    }
}
