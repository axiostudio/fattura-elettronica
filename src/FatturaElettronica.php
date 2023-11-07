<?php

namespace Axiostudio\FatturaElettronica;

use Symfony\Component\Validator\Validation;
use Axiostudio\FatturaElettronica\Contracts\Model;

class FatturaElettronica
{
    public function createModel(Model $model)
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $errors = $validator->validate($model);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \Exception($errorsString);
        }

        return $model;
    }
}
