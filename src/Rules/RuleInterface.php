<?php

namespace hstanleycrow\FormValidator\Rules;

interface RuleInterface
{
    public function passes($value): bool;
    public function message($attribute): string;
}
