<?php

namespace hstanleycrow\FormValidator\Rules\CustomRules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class SvPhoneNumberRule implements RuleInterface
{
    protected string $type;
    public function __construct(string $type)
    {
        $this->type = $type;
    }

    public function passes($value): bool
    {
        // Elimina espacios en blanco y guiones para simplificar la validación.
        $value = str_replace([' ', '-'], '', $value);

        // Verifica si el número tiene 8 dígitos.
        if (strlen($value) !== 8) {
            return false;
        }

        // Verifica si el primer dígito indica un número fijo (1) o celular (6, 7, 8).
        $firstDigit = substr($value, 0, 1);
        if ($this->type === 'fix') {
            return in_array($firstDigit, ['2']);
        } elseif ($this->type === 'mov') {
            return in_array($firstDigit, ['6', '7', '8']);
        }

        return false;
    }

    public function message($attribute): string
    {
        return "$attribute must be a valid phone number.";
    }
}
