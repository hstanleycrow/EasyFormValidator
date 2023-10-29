<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class ConfirmedRule implements RuleInterface
{
    protected $confirmationField;

    public function __construct($fieldToConfirm)
    {
        $this->confirmationField = $fieldToConfirm . '_confirmation';
    }

    public function passes($value): bool
    {
        $confirmationValue = isset($_POST[$this->confirmationField]) ? $_POST[$this->confirmationField] : null;
        return $value === $confirmationValue;
    }

    public function message($attribute): string
    {
        $confirmationAttribute = str_replace('_confirmation', '', $this->confirmationField);
        return "$attribute must match $confirmationAttribute.";
    }
}
