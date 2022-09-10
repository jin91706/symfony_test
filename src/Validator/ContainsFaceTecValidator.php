<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class ContainsFaceTecValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        // Create custom validtor. Only allow 'Face' case sensitive or 'Tec' case insensitive.
        if (!preg_match('/(Face|Tec|tec)/', $value, $matches)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}