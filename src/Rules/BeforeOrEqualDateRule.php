<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;
use DateTime;

class BeforeOrEqualDateRule implements RuleInterface
{
    protected $dateToCompare;

    public function __construct($dateToCompare)
    {
        $this->dateToCompare = $dateToCompare;
    }

    public function passes($value): bool
    {
        $valueDate = new DateTime($value);
        $compareDate = new DateTime($this->dateToCompare);

        return $valueDate <= $compareDate;
    }

    public function message($attribute): string
    {
        return "$attribute must be a date before or equal to {$this->dateToCompare}.";
    }
}
