<?php

namespace hstanleycrow\FormValidator;

use hstanleycrow\FormValidator\ValidationException;

class Validator
{
    protected static $ruleMap = [
        'required' => Rules\RequiredRule::class,
        'string' => Rules\StringRule::class,
        'integer' => Rules\IntegerRule::class,
        'min' => Rules\MinRule::class,
        'max' => Rules\MaxRule::class,
        'in' => Rules\InRule::class,
        'email' => Rules\EmailRule::class,
        'url' => Rules\UrlRule::class,
        'phone' => Rules\PhoneNumberRule::class,
        'confirmed' => Rules\ConfirmedRule::class,
    ];
    public static function validate(array $data = [], array $rules = [], ?array $messages = [])
    {
        foreach ($rules as $field => $ruleSet) :
            $rulesArray = explode('|', $ruleSet);
            foreach ($rulesArray as $rule) :
                $parts = explode(':', $rule, 2);
                $ruleName = $parts[0];
                $parameter = $parts[1] ?? null;

                if (isset(self::$ruleMap[$ruleName])) :
                    $ruleInstance = ($parameter !== null)
                        ? new self::$ruleMap[$ruleName]($parameter)
                        : new self::$ruleMap[$ruleName];

                    $value = $data[$field] ?? null;

                    if (!$ruleInstance->passes($value)) :
                        $errors[$field][] =
                            (array_key_exists($field . '.' . $ruleName, $messages)) ?  $messages[$field . '.' . $ruleName] : $ruleInstance->message($field);
                    #$errors[$field][] = $ruleInstance->message($field);
                    endif;
                endif;
            endforeach;
        endforeach;
        if (!empty($errors))
            throw new ValidationException($errors);
    }
}
