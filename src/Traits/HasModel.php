<?php

namespace Axiostudio\FatturaElettronica\Traits;

use Symfony\Component\Validator\Validation;
use Axiostudio\FatturaElettronica\Contracts\Model;

trait HasModel
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

        return $this->modelToArray($model);
    }

    protected function modelToArray(Model $model): array
    {
        return json_decode(json_encode($model), true);
    }
};
