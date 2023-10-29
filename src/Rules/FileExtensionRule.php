<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class FileExtensionRule implements RuleInterface
{
    protected $allowedExtensions;

    public function __construct($allowedExtensions)
    {
        $this->allowedExtensions = $allowedExtensions;
    }

    public function passes($value): bool
    {
        if (!is_string($value) || empty($value)) {
            return false;
        }

        $extension = pathinfo($value, PATHINFO_EXTENSION);
        return in_array($extension, $this->allowedExtensions);
    }

    public function message($attribute): string
    {
        $allowedExtensionsStr = implode(', ', $this->allowedExtensions);
        return "$attribute must have one of the following extensions: $allowedExtensionsStr.";
    }
}
