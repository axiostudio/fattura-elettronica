<?php

namespace Axiostudio\FatturaElettronica\Contracts;

use Symfony\Component\Validator\Mapping\ClassMetadata;

interface Model
{
    public function __construct(...$args);

    public static function loadValidatorMetadata(ClassMetadata $metadata): void;
}
