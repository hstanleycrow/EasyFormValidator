<?php

namespace hstanleycrow\FormValidator\Rules;

use hstanleycrow\FormValidator\Rules\RuleInterface;

class UrlRule implements RuleInterface
{
    protected $message = ":attribute must be a valid URL.";
    public function passes($value): bool
    {
        return $this->validateURL($value);
        //return filter_var($value, FILTER_VALIDATE_URL);
    }

    public function message($attribute): string
    {
        return str_replace(":attribute", $attribute, $this->message);
        //return "{{$attribute}} must be a valid URL.";
    }
    private function validateURL($url): bool
    {
        // Eliminamos todos los caracteres ilegales de la URL.
        $url = filter_var($url, FILTER_SANITIZE_URL);

        // Comprobamos que la URL tenga un esquema válido.
        $scheme = parse_url($url, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https'])) {
            return false;
        }

        // Comprobamos que la URL tenga un host válido.
        $host = parse_url($url, PHP_URL_HOST);
        if (!preg_match('/^[a-z0-9\-\.]+$/i', $host)) {
            return false;
        }

        // Comprobamos que la URL tenga un puerto válido, si es que tiene uno.
        $port = parse_url($url, PHP_URL_PORT);
        if ($port !== null) {
            if (!preg_match('/^[0-9]+$/', $port)) {
                return false;
            }
        }

        // Comprobamos que la URL tenga un path válido.
        $path = parse_url($url, PHP_URL_PATH);
        if (!preg_match('/^[a-z0-9\-\.\/\?]+$/i', $path)) {
            return false;
        }

        // Comprobamos que la URL tenga una query string válida, si es que tiene una.
        $query = parse_url($url, PHP_URL_QUERY);
        if ($query !== null) {
            if (!preg_match('/^[a-z0-9\-\.\?\&]+$/i', $query)) {
                return false;
            }
        }

        // Devolvemos true si la URL es válida.
        return true;
    }
}
