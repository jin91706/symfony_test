<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsFaceTec extends Constraint
{
    // Create custom validation message
    public $message = 'The string "{{ string }}" does not contain Face, case sensitive, or Tec, case insensitive.';

    public function validatedBy()
    {
        return static::class.'Validator';
    }
}