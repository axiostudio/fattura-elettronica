<?php

namespace Axiostudio\FatturaElettronica;

use Symfony\Component\Validator\Validation;
use Axiostudio\FatturaElettronica\Contracts\DTO;

class FatturaElettronica
{
    public function block(DTO $dto)
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $errors = $validator->validate($dto);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \Exception($errorsString);
        }

        return $dto;
    }
}
