<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Anagrafica implements Model
{
    public string $Denominazione;

    public function __construct(...$args)
    {
        $this->Denominazione = $args[0];
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
        //
    }
}
