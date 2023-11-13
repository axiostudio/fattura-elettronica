<?php

declare(strict_types=1);

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 * Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Axiostudio\FatturaElettronica\Handlers;

use Axiostudio\FatturaElettronica\Contracts\Model as ModelInterface;
use Symfony\Component\Validator\Validation;

trait Model
{
    public function createModel(ModelInterface $model, bool $toArray = false): array|ModelInterface
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator()
        ;

        $errors = $validator->validate($model);

        if (\count($errors) > 0) {
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
}
