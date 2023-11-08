<?php

namespace Axiostudio\FatturaElettronica\Handlers;

use Symfony\Component\Validator\Validation;
use Axiostudio\FatturaElettronica\Contracts\ModelInterface;

trait ModelHandlers
{
    public function createModel(ModelInterface $model, bool $toArray = false): array|ModelInterface
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

    protected function modelToArray(ModelInterface $model): array
    {
        return json_decode(json_encode($model), true);
    }
};
