<?php

namespace hstanleycrow\FormValidator;

class ValidationException extends \Exception
{
    protected array $errors;
    public function __construct(
        array $errors,
        string $message = "Validation failed",
        int $code = 0,
        \Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
