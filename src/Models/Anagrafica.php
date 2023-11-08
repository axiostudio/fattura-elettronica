<?php

namespace Axiostudio\FatturaElettronica\Models;

use Axiostudio\FatturaElettronica\Contracts\Model;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Anagrafica implements Model
{
    public ?string $Denominazione;
    public ?string $Nome;
    public ?string $Cognome;

    public function __construct(...$args)
    {
        if ($args[0]) {
            $this->Denominazione = $args[0] ?? null;
        }

        if ($args[1]) {
            $this->Nome = $args[1];
        }

        if ($args[2]) {
            $this->Cognome = $args[2];
        }
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata): void
    {
    }
}
