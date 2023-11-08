<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Symfony\Component\Validator\Validation;

trait Model
{
    public function createModel(Model $model, bool $toArray = false): array|Model
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        $errors = $validator->validate($model);

        if (count($errors) > 0) {
            $errorsString = (string) $errors;
            throw new \Exception($errorsString);
        }

        if (!$toArray) {
            return $model;
        }

        return $this->modelToArray($model);
    }

    protected function modelToArray(Model $model): array
    {
        return json_decode(json_encode($model), true);
    }
};
