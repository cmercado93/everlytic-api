<?php

namespace Cmercado93\EverlyticApi\Exceptions;

use Cmercado93\EverlyticApi\Exceptions\BaseException;

class ErrorException extends BaseException
{
    protected $errors = [];

    public function __construct(array $errors, string $message = '', $code = 0, \Exception $previous = null)
    {
        $this->setErrors($errors);

        return parent::__construct($message, $code, $previous);
    }

    public function setErrors(array $errors)
    {
        $this->errors = $errors;
    }

    public function getErrors() : array
    {
        return $this->errors;
    }
}
