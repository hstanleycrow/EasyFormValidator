<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;


class maxRule implements RuleInterface
{
    protected $max;

    public function __construct($max)
    {
        $this->max = $max;
    }
    public function passes($value): bool
    {
        if (is_string($value)) :
            return strlen($value) <= $this->max;
        elseif (is_numeric($value)) :
            return $value <= $this->max;
        endif;
    }

    public function message($attribute): string
    {
        return "$attribute must not exceed $this->max characters or value";
    }
}
