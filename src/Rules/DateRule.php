<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class DateRule implements RuleInterface
{
    protected $format;

    public function __construct($format = 'Y-m-d')
    {
        $this->format = $format;
    }

    public function passes($value): bool
    {
        $parsedDate = date_create_from_format($this->format, $value);
        return $parsedDate !== false && date_format($parsedDate, $this->format) == $value;
    }

    public function message($attribute): string
    {
        return "$attribute must be a valid date in the format: {$this->format}.";
    }
}
