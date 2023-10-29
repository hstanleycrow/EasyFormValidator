<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class minRule implements RuleInterface
{
    protected $min;

    public function __construct($min)
    {
        $this->min = $min;
    }
    public function passes($value): bool
    {
        if (is_string($value)) :
            return strlen($value) >= $this->min;
        elseif (is_numeric($value)) :
            return $value >= $this->min;
        endif;
    }

    public function message($attribute): string
    {
        return "$attribute must be at least $this->min characters or value";
    }
}
