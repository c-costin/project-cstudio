<?php
namespace App\Models;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class ErrorValidationConstraints
{
    private $messagesList = [];

    public function __construct(ConstraintViolationListInterface $constraintViolationListInterface)
    {
        foreach ($constraintViolationListInterface as $constraintViolation) {
            $message = $constraintViolation->getPropertyPath() . ": " . $constraintViolation->getMessage();
            $this->messagesList[] = $message;
        }
    }

    public function getAllMessage()
    {
        return $this->messagesList;
    }
}